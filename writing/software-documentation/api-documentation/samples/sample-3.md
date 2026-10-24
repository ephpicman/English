# API reference: List tickets with cursor pagination

*Illustrative API contract. This is not a verified live endpoint; validate the schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, its inputs, response, errors, limits, and a safe usage example.

## Overview

Lists tickets visible to the authenticated caller. Cursor pagination allows clients to retrieve successive pages without requesting an arbitrary page number. The contract below is illustrative; confirm the ordering, filter semantics, and cursor format in the real implementation.

## Authentication and permissions

Send a bearer access token. The service must apply account and role-based access controls before returning results, including on every subsequent page.

## Endpoint and method

**GET `/v1/tickets`**

## Parameters

- `limit` (optional integer): number of items requested; example default 20, maximum 100.
- `status` (optional): filter by a documented status value.
- `cursor` (optional opaque string): continue from the prior response’s `next_cursor`.

## Request body

No request body is used for this GET operation.

## Successful response

```json
{
  "items": [
    {"id": "tkt_example_123", "status": "open"}
  ],
  "next_cursor": "cursor_example_next"
}
```

## Errors and edge cases

- `400 Bad Request`: unsupported status, invalid limit, or malformed cursor.
- `401 Unauthorized`: missing or invalid token.
- `429 Too Many Requests`: rate limit reached.
- `5xx`: server-side failure; use documented retry behaviour.

## Limits and operational behaviour

The cursor is opaque and must not be edited by the client. Define a stable ordering with a unique tie-breaker. A cursor may become invalid after a retention or schema change; the API should document how clients restart pagination.

## Tested usage example

```bash
curl "https://api.example.test/v1/tickets?limit=20&status=open" \
  -H "Authorization: Bearer $ACCESS_TOKEN"
```
To fetch the next page, pass the returned cursor as a URL-encoded query parameter. This sample has not been executed against a live service.

## Final quality check

Verify method, path, authentication, permission checks, schema, status codes, pagination or concurrency behaviour, and example safety. Test requests against a controlled environment and record the API version before calling the example tested.
