# API reference: List project activity

*Illustrative API contract. Confirm pagination, sorting, filtering, and access-control behaviour before publication.*

## Before drafting

Use the current API specification and database ordering rules as the source of truth. The example does not claim a live endpoint exists.

## Document structure

The reference describes list behaviour, query parameters, response fields, errors, and operational limits.

## Overview

Returns activity records visible to the authenticated user. The service should apply access controls before filtering or paginating the result.

## Authentication and permissions

A bearer token is required. The caller can retrieve only activity they are authorised to view. Do not treat an activity identifier or cursor as proof of permission.

## Endpoint and method

**GET** /v1/projects/{project_id}/activity

## Parameters

- **project_id** — required path parameter.
- **limit** — optional page size with a documented maximum.
- **cursor** — optional continuation token returned by the previous response.
- **type** — optional event-type filter if supported.

Confirm defaults and accepted values in the actual implementation.

## Request body

No request body is used for this GET operation.

## Successful response

Illustrative response:

```json
{
  "items": [
    {
      "id": "evt_example_1",
      "type": "comment_added",
      "created_at": "2026-10-20T09:30:00Z"
    }
  ],
  "next_cursor": null
}
```

The event ID and timestamp are synthetic examples.

## Errors and edge cases

Document malformed cursors, inaccessible projects, unsupported filters, rate limiting, and temporary service failures. Do not promise stable snapshot semantics unless the API implements them.

## Limits and operational behaviour

Specify the maximum page size, deterministic ordering, and what happens when new events arrive between requests. Apply the same permission checks to every page.

## Tested usage example

Test an empty project, a project with multiple event types, a malformed cursor, and a user without project access. Verify that pagination neither duplicates nor skips records under the documented conditions.

## Final quality check

Ensure the query parameters and pagination contract match the implementation.
