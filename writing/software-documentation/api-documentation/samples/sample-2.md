# API reference: Retrieve an order

*Illustrative API contract. Verify the route, response fields, and access rules against the actual implementation.*

## Before drafting

Confirm how order ownership is checked and whether the API returns different fields for different roles.

## Document structure

This reference covers retrieval of one order, required permissions, response shape, and failure cases.

## Overview

Retrieves an order by its identifier for an authorised caller. The route and examples are illustrative and do not describe a verified live endpoint.

## Authentication and permissions

A valid access token is required. The caller must be permitted to view the requested order. The service should not reveal whether an order exists when the caller is not authorised, unless the actual API contract explicitly specifies otherwise.

## Endpoint and method

**GET** /v1/orders/{order_id}

## Parameters

- **order_id** — required path parameter; use the identifier returned when the order was created.
- **include_items** — optional boolean query parameter only if supported by the implementation.

Validate identifier format and reject malformed values consistently.

## Request body

No request body is used for this GET operation.

## Successful response

Illustrative response:

```json
{
  "id": "ord_example_456",
  "status": "processing",
  "currency": "EUR",
  "items": [
    {"sku": "item-example", "quantity": 1}
  ]
}
```

All values are synthetic. Confirm whether item details are included by default.

## Errors and edge cases

- **400:** malformed identifier or invalid query parameter.
- **401:** missing or invalid authentication.
- **403 or 404:** access denied or order not found, according to the documented privacy policy.
- **429:** rate limit exceeded.

## Limits and operational behaviour

Document pagination if item lists can be large, caching behaviour if applicable, and any consistency delay between order updates and retrieval.

## Tested usage example

In a test environment, retrieve an order created by the same test account, then test a nonexistent identifier and an order belonging to another account. Confirm that the response does not expose unauthorised data.

## Final quality check

Verify route syntax, ownership checks, and the exact response schema before release.
