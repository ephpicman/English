# API reference: Create a support ticket

*Illustrative API contract. This is not a verified live endpoint; validate the schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, its inputs, response, errors, limits, and a safe usage example.

## Overview

Creates a support ticket for an authenticated user. This is an illustrative API contract, not a verified live endpoint. The service stores the request and returns a ticket identifier that can be used for later retrieval.

## Authentication and permissions

Send a bearer access token in the `Authorization` header. The token must have permission to create tickets for the authenticated account. Never include a real token in examples or logs.

## Endpoint and method

**POST `/v1/tickets`**

## Parameters

No query parameters are required for the basic operation. The server assigns the ticket ID and creation timestamp.

## Request body

{
  "subject": "Cannot access project dashboard",
  "description": "The page returns an error after sign-in.",
  "priority": "normal"
}

## Successful response

```json
{
  "id": "tkt_example_123",
  "subject": "Cannot access project dashboard",
  "status": "open",
  "priority": "normal",
  "created_at": "2026-10-24T10:00:00Z"
}
```

## Errors and edge cases

- `400 Bad Request`: missing or invalid required field.
- `401 Unauthorized`: token is missing or invalid.
- `403 Forbidden`: caller lacks permission to create tickets.
- `429 Too Many Requests`: request rate limit reached.
- `5xx`: server-side failure; retry only according to the service’s retry guidance.

## Limits and operational behaviour

Set a maximum description length and rate limit in the actual implementation. Do not place passwords, access tokens, or unnecessary personal data in ticket descriptions. The response schema and field limits must be verified against the deployed service.

## Tested usage example

```bash
curl -X POST "https://api.example.test/v1/tickets" \
  -H "Authorization: Bearer $ACCESS_TOKEN" \
  -H "Content-Type: application/json" \
  -d '{"subject":"Dashboard access","description":"Error after sign-in","priority":"normal"}'
```
This example uses a reserved test domain and a shell variable; it has not been executed against a live service.

## Final quality check

Verify method, path, authentication, permission checks, schema, status codes, pagination or concurrency behaviour, and example safety. Test requests against a controlled environment and record the API version before calling the example tested.
