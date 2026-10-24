# API reference: Upload a document

*Illustrative API contract. Confirm file limits, scanning behaviour, and storage permissions before implementation.*

## Before drafting

Use the actual upload contract and security requirements. The examples below are not a verified live endpoint.

## Document structure

This reference describes upload requirements, permissions, response data, and failure cases.

## Overview

Uploads a document to an authorised workspace and returns a file reference. The endpoint should not imply that the file is safe or available to other users until required validation and scanning are complete.

## Authentication and permissions

Require a valid token and permission to upload to the target workspace. Validate workspace access server-side. Do not trust a client-supplied file name or content type as proof of file safety.

## Endpoint and method

**POST** /v1/workspaces/{workspace_id}/files

## Parameters

- **workspace_id** — required path parameter.
- **file** — required multipart file field.
- **purpose** — optional field only if supported by the implementation.

Document accepted media types and the maximum upload size from the real service configuration.

## Request body

Use multipart form data with the file field. Do not encode large files as JSON unless the API explicitly requires that format.

## Successful response

Illustrative response:

```json
{
  "file_id": "file_example_789",
  "status": "pending_scan"
}
```

The identifier is synthetic. Confirm whether the service returns a pending, ready, or rejected status.

## Errors and edge cases

Document unsupported media type, file too large, invalid workspace, insufficient permission, failed scan, and temporary storage errors.

## Limits and operational behaviour

State upload size, timeouts, retention, and when the file becomes available. Define safe retry behaviour so that network failures do not create uncontrolled duplicate uploads.

## Tested usage example

Use a harmless test file and test accepted, rejected, oversized, and interrupted uploads. Confirm that rejected files are not exposed to other users.

## Final quality check

Verify upload handling, scan status, storage access, and all error codes against the actual service.
