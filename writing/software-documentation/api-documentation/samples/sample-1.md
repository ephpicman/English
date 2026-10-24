# API reference: Create a support ticket

*Illustrative API contract only. Validate schema, permissions, limits, and status codes against the actual implementation.*

## Before drafting

Confirm the product version, source-of-truth schema, authentication model, and supported error behaviour. Do not publish untested examples as working requests.

## Document structure

This reference describes the operation, inputs, response, errors, limits, and a safe example.

## Overview

Creates a support ticket for the authenticated account and returns a ticket identifier. The endpoint and response below are illustrative, not a verified live service.

## Authentication and permissions

Send a bearer access token in the Authorization header. The token must have permission to create tickets for the account. Never include a real token in examples or logs.

## Endpoint and method

**POST** /v1/tickets

## Parameters

No query parameters are required in this example. The service may support optional client reference fields only if they are defined in the actual API schema.

## Request body

```json
{
  "subject": "Unable to update account email",
  "description": "The save action returns an error.",
  "priority": "normal"
}
```

The subject and description are illustrative required fields. Confirm length limits and allowed priority values before implementation.

## Successful response

Illustrative response with HTTP 201:

```json
{
  "id": "tkt_example_123",
  "status": "open"
}
```

The identifier is synthetic and must not be treated as a real ticket.

## Errors and edge cases

- **400 Bad Request:** the request body is invalid.
- **401 Unauthorized:** authentication is missing or invalid.
- **403 Forbidden:** the caller lacks permission.
- **429 Too Many Requests:** a rate limit has been reached.
- **5xx:** a server-side failure occurred.

Verify actual status codes and error schema. Clients should not retry every failure blindly.

## Limits and operational behaviour

Confirm request-size limits, rate limits, idempotency behaviour, and whether ticket creation triggers notifications. Do not assume a retry is safe unless the API contract defines it.

## Tested usage example

Use a test environment and synthetic data. Verify that a successful response contains the documented identifier and that invalid input produces the expected error without creating a ticket.

## Final quality check

Validate every field, code, status, and permission against the maintained API specification before publication.
