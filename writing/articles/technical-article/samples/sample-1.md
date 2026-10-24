# Implementing cursor pagination for an activity feed
*Illustrative technical article. Verify commands, versions, architecture, and security requirements against the actual implementation before use.*
## Summary
Cursor pagination lets a client retrieve an ordered set of records without relying on increasingly large offsets. It is useful for feeds that grow continuously, provided the ordering is deterministic and the cursor represents the last item returned. This article explains the query model, cursor contents, response contract, and edge cases. The examples are illustrative SQL and JSON; adapt them to the actual database, schema, and API contract before use.
## Scope and Prerequisites
The intended reader understands HTTP APIs, SQL queries, and basic database indexing. The example assumes a feed ordered by creation time and a unique ID, with descending order. It does not cover arbitrary user-selected sorting or a production-specific authentication scheme.
## Core Concepts

A page is a bounded slice of an ordered result set. Offset pagination skips a number of rows, which can become expensive for deep pages and can shift when new rows are inserted. A cursor instead identifies the boundary after which the next query should continue. The ordering must be stable: if timestamps can tie, include a unique tie-breaker such as the record ID.

A cursor should be treated as opaque by clients. It can encode the boundary values and, where appropriate, be signed to prevent tampering. It should not contain secrets or expose data that the caller is not authorised to see.

## Architecture or Workflow

Cursor pagination also needs a clear contract for filters. The server should apply the same authorisation and filter predicates to every page; otherwise, a cursor could accidentally cross a boundary between records the user may and may not see. If the filter changes, a cursor generated for the old query should either be rejected or be explicitly scoped to that filter. The response should explain whether cursors expire and what clients should do when the server returns an invalid-cursor error.

For a descending feed, the server queries rows whose `(created_at, id)` tuple is earlier than the last row in the previous page. The server fetches `limit + 1` rows to determine whether another page exists, returns at most `limit`, and constructs the next cursor from the final returned row. Filtering and authorisation must be applied consistently on every page.

A response might contain `items` and `next_cursor`. If there are no more results, `next_cursor` can be null. The API should document maximum page size, cursor expiry if any, and how clients should react when a cursor is invalid.

## Implementation Details

Illustrative SQL pattern:

```sql
SELECT id, created_at, title
FROM activity
WHERE (created_at, id) < (:cursor_time, :cursor_id)
ORDER BY created_at DESC, id DESC
LIMIT :limit_plus_one;
```

This tuple comparison is supported by some SQL engines; verify syntax and index behaviour for the actual database. The initial page omits the cursor predicate. Validate `limit` against a server-side maximum, and never trust a client-supplied cursor as an authorisation decision. An index aligned with the filter and ordering can improve query performance.

## Limitations and Operational Concerns

Testing should include timestamps that are identical, a record inserted between requests, a record deleted after the first page, and a client that repeats the same cursor. These cases expose unstable ordering and accidental duplication. Measure query plans with representative data rather than assuming that a cursor is efficient simply because it avoids offsets.

Cursor pagination is well suited to sequential browsing but does not naturally provide “jump to page 12.” Updates to sort fields can also move records across boundaries. Define whether the feed represents a live view or a stable snapshot, and test equal timestamps, deleted records, invalid cursors, empty pages, and new inserts between requests.

## Conclusion

A reliable cursor API needs deterministic ordering, consistent filtering, an opaque cursor, and explicit edge-case behaviour. Test the contract with realistic data before relying on it for a high-volume feed.