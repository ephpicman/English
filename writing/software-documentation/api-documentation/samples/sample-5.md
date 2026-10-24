# API reference: Add a comment to a support ticket

*Illustrative API contract. This is not a verified live endpoint; validate the schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, its inputs, response, errors, limits, and a safe usage example.

## Overview

Adds a comment to an existing ticket. The endpoint should distinguish public replies from internal notes and enforce permissions so internal content is not accidentally disclosed to a customer.

## Authentication and permissions

Send a bearer token with permission to comment on the ticket. If the API supports internal notes, require a separate permission and make the visibility field explicit.

## Endpoint and method

**POST `/v1/tickets/{ticket_id}/comments`**

## Parameters

`ticket_id` (path, required): target ticket identifier.

## Request body

{
  "body": "I have reproduced the issue and am checking the authentication logs.",
  "visibility": "internal"
}

## Successful response

```json
{
  "id": "cmt_example_456",
  "ticket_id": "tkt_example_123",
  "visibility": "internal",
  "created_at": "2026-10-24T11:00:00Z"
}
```

## Errors and edge cases

- `400 Bad Request`: empty body or unsupported visibility.
- `401 Unauthorized`: missing or invalid token.
- `403 Forbidden`: caller lacks comment or internal-note permission.
- `404 Not Found`: ticket is unavailable to the caller.
- `413 Content Too Large`: comment exceeds the documented limit, if this status is used by the implementation.

## Limits and operational behaviour

Set a maximum comment length, escape or safely render user-supplied content, and avoid including secrets or unnecessary personal data. The actual API must specify whether comments can be edited or deleted.

## Tested usage example

```bash
curl -X POST "https://api.example.test/v1/tickets/tkt_example_123/comments" \
  -H "Authorization: Bearer $ACCESS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"body":"Investigating the issue","visibility":"internal"}'
```
The host and identifiers are examples, not a real service. Verify the visibility rules before adapting this pattern.

## Final quality check

Verify method, path, authentication, permission checks, schema, status codes, pagination or concurrency behaviour, and example safety. Test requests against a controlled environment and record the API version before calling the example tested.
