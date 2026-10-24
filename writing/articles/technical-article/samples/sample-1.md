# Implementing cursor pagination for an activity feed

*Illustrative technical article. Verify commands, versions, schema, and security requirements against the actual implementation before use.*

## Summary

Cursor pagination lets a client retrieve an ordered result set in bounded pages without repeatedly skipping earlier rows. It is useful for growing feeds, provided that ordering is deterministic and the cursor represents a stable boundary. A correct implementation must define sorting, filtering, page size, cursor validation, and behaviour when records change between requests. The examples below illustrate the design; database syntax, indexes, and response fields must be checked against the real service.

## Scope and Prerequisites

The intended reader understands HTTP APIs, SQL, and database indexing. The example assumes an activity feed ordered by creation time, newest first, with a unique record identifier as a tie-breaker. It does not cover arbitrary client-selected sorting or a production-specific authentication model. Before implementation, confirm the database engine, schema, access-control rules, and whether clients require a live feed or a stable snapshot.

## Core Concepts

Offset pagination asks the database to skip a number of rows and return the next set. It is easy to understand, but deep offsets can require extra work, and insertions or deletions between requests may shift the rows a client sees. Cursor pagination instead records the boundary of the last item returned and asks for items beyond that boundary in the chosen order.

The order must be deterministic. A timestamp alone is not sufficient if multiple records share the same timestamp; include a unique key such as an ID. The cursor should be opaque to clients and must not act as an authorisation token. The server should validate it and apply the same access-control and filter rules on every request.

## Architecture or Workflow

For a descending feed, the server retrieves rows whose ordering key is earlier than the last row in the previous page. It requests one more row than the page size to determine whether another page exists, returns only the configured maximum, and builds the next cursor from the final returned row. If no additional row exists, the response can return a null continuation cursor.

Filters need to be part of the contract. A cursor created for one filter should not silently be reused with a different filter if that would change the meaning of the boundary. The API can reject mismatched cursors or encode a fingerprint of the relevant query parameters. In either case, normal permission checks must run on every page; possession of a cursor must never grant access to records.

The response should document the page-size limit, cursor expiry if any, ordering, and whether new records may appear between pages. A live feed and a stable snapshot are different behaviours and should not be confused.

## Implementation Details

An illustrative SQL pattern for a database that supports row-value comparison is:

```sql
SELECT id, created_at, title
FROM activity
WHERE (created_at, id) < (:cursor_time, :cursor_id)
ORDER BY created_at DESC, id DESC
LIMIT :limit_plus_one;
```

Verify the syntax and query plan for the chosen database. The initial page omits the cursor predicate. Validate the requested page size against a server-side maximum and reject malformed or expired cursors with a documented error. An index aligned with the relevant filters and ordering can help, but its effectiveness depends on data distribution and query shape.

## Limitations and Operational Concerns

Test equal timestamps, deleted records, records inserted between requests, invalid cursors, empty results, and repeated requests with the same cursor. Updates to sort fields can move records across boundaries, so immutable ordering keys are preferable. Cursor pagination also does not naturally support jumping directly to an arbitrary page number.

Monitor query duration, page size, invalid-cursor rates, and endpoint failures. Avoid logging the full cursor if it encodes internal state. Performance should be measured using representative data rather than assumed from the pagination method alone.

### A practical validation checklist

Before releasing a cursor-based endpoint, review the contract from the perspective of a client author. Confirm the default and maximum page sizes, the ordering direction, the meaning of an empty result, and the response field used for continuation. Decide whether a cursor is valid only for one filter set and whether it expires. If the cursor is malformed, return a stable documented error rather than silently starting at the first page, because a silent restart can cause clients to repeat work.

The query plan should be inspected with representative data. An index that matches the ordering may help, but additional filters can change which index is effective. Test with a dataset large enough to reveal deep-page behaviour and include skewed distributions, not only evenly distributed synthetic rows. Avoid publishing a performance claim unless it comes from a reproducible benchmark with the environment and query shape recorded.

Finally, define client behaviour when a request fails halfway through pagination. A client should keep the last confirmed cursor and retry according to the documented error policy. It should not advance its local cursor until it has successfully processed the returned page. This coordination between server contract and client logic is essential to avoid missing records.

## Conclusion

A reliable cursor API needs deterministic ordering, consistent filters, opaque cursor handling, and explicit edge-case behaviour. Test the contract from both server and client perspectives, document how to restart after an invalid cursor, and treat changes to cursor semantics as an API compatibility concern.
