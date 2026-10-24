# API reference: Retrieve a support ticket

*Illustrative API contract. This is not a verified live endpoint; validate the schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, its inputs, response, errors, limits, and a safe usage example.

## Overview

Retrieves one ticket by its identifier, subject to the caller’s access permissions. This illustrative reference demonstrates the expected shape of a read endpoint; verify the actual schema and authorisation rules before implementation.

## Authentication and permissions

Send a bearer access token with permission to view the requested ticket. The server must check access to the specific ticket, not merely whether the caller is authenticated.

## Endpoint and method

**GET `/v1/tickets/{ticket_id}`**

## Parameters

`ticket_id` (path, required): identifier returned when the ticket was created. Treat it as an identifier, not as proof of access.

## Request body

No request body is used for this GET operation.

## Successful response

```json
{
  "id": "tkt_example_123",
  "subject": "Dashboard access",
  "status": "open",
  "priority": "normal",
  "created_at": "2026-10-24T10:00:00Z",
  "updated_at": "2026-10-24T10:00:00Z"
}
```

## Errors and edge cases

- `400 Bad Request`: malformed ticket identifier.
- `401 Unauthorized`: missing or invalid token.
- `403 Forbidden`: caller is not allowed to view the ticket.
- `404 Not Found`: ticket does not exist, or the service intentionally hides its existence from this caller.

## Limits and operational behaviour

The actual service should define whether inaccessible and nonexistent tickets return the same status to reduce information disclosure. Clients should not assume that sequential IDs are private or predictable.

## Tested usage example

```bash
curl "https://api.example.test/v1/tickets/tkt_example_123" \
  -H "Authorization: Bearer $ACCESS_TOKEN"
```
Use a ticket ID and token from a controlled test environment. This example is illustrative and has not been run against a live service.

## Final quality check

Verify method, path, authentication, permission checks, schema, status codes, pagination or concurrency behaviour, and example safety. Test requests against a controlled environment and record the API version before calling the example tested.
