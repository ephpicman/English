# API reference: Update a ticket status

*Illustrative API contract. This is not a verified live endpoint; validate the schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, its inputs, response, errors, limits, and a safe usage example.

## Overview

Changes the status of an existing ticket when the caller is authorised and the transition is permitted. This example illustrates a partial update contract; the real service must document its allowed state transitions and concurrency behaviour.

## Authentication and permissions

Send a bearer access token with permission to update the ticket. The service should verify access to the ticket and reject transitions that are not allowed by the workflow.

## Endpoint and method

**PATCH `/v1/tickets/{ticket_id}`**

## Parameters

`ticket_id` (path, required): ticket identifier. The request may optionally include a version or conditional header if the service supports optimistic concurrency.

## Request body

{
  "status": "in_progress"
}

## Successful response

```json
{
  "id": "tkt_example_123",
  "status": "in_progress",
  "updated_at": "2026-10-24T10:30:00Z"
}
```

## Errors and edge cases

- `400 Bad Request`: malformed body or unsupported status value.
- `401 Unauthorized`: missing or invalid token.
- `403 Forbidden`: caller lacks update permission.
- `404 Not Found`: ticket is unavailable to the caller.
- `409 Conflict`: requested transition conflicts with current state.

## Limits and operational behaviour

Document valid status values and transitions from the actual workflow. If concurrent edits are possible, use a version field or conditional request to avoid silently overwriting another user’s change.

## Tested usage example

```bash
curl -X PATCH "https://api.example.test/v1/tickets/tkt_example_123" \
  -H "Authorization: Bearer $ACCESS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"status":"in_progress"}'
```
This is a sample request only; it has not been executed against a live endpoint.

## Final quality check

Verify method, path, authentication, permission checks, schema, status codes, pagination or concurrency behaviour, and example safety. Test requests against a controlled environment and record the API version before calling the example tested.
