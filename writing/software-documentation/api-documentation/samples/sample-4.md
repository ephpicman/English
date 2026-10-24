# API reference: Update a user notification preference

*Illustrative API contract. Verify the available preference fields, authentication, and audit requirements.*

## Before drafting

Confirm which preferences the API supports and whether changes require additional verification.

## Document structure

This reference defines the operation, permissions, request fields, response, and failure behaviour.

## Overview

Updates a notification preference for the authenticated user. The example is illustrative and must be aligned with the actual user-settings schema.

## Authentication and permissions

Require an access token for the user whose settings are being changed, or an explicitly authorised administrative role. Do not allow a caller to update another user’s preferences by changing an identifier alone.

## Endpoint and method

**PATCH** /v1/me/notification-preferences

## Parameters

No path or query parameters are required in this example. Confirm whether the implementation supports partial updates and how omitted fields are handled.

## Request body

```json
{
  "product_updates": false,
  "service_messages": true
}
```

These fields are examples only. Service-critical messages may have different rules from optional marketing or product updates.

## Successful response

Illustrative response:

```json
{
  "product_updates": false,
  "service_messages": true,
  "updated_at": "2026-10-24T12:00:00Z"
}
```

Confirm the real response fields and timestamp format.

## Errors and edge cases

Document invalid field names, unsupported values, unauthorised updates, and rate limiting. The service should reject unknown fields or handle them according to the published contract, not silently imply that they were saved.

## Limits and operational behaviour

Explain whether updates take effect immediately, how preferences are audited, and whether any settings cannot be disabled for operational or legal reasons.

## Tested usage example

Test updating one field, sending an invalid field, and submitting an empty body. Confirm that the response accurately reflects stored preferences.

## Final quality check

Verify preference names, allowed values, and policy constraints before publishing.
