# Technical specification: document upload service

*Illustrative specification. Validate file limits, scanning requirements, and storage controls with the service and security owners.*

## Purpose, scope, and terminology

Specify an API for uploading a document to an authorised workspace. Scope includes upload, validation, storage status, and retrieval reference. A “pending scan” file is not yet available for general use.

## Background and goals

Users need to submit documents without relying on email attachments. The service must validate uploads, enforce workspace permissions, and make processing status clear.

## Functional requirements

- Accept supported file types within a configured size limit.
- Validate the caller’s permission for the target workspace.
- Store the file in the approved storage service.
- Return a file identifier and processing status.
- Reject invalid or disallowed files without exposing them to other users.
- Record upload and processing outcomes for authorised support staff.

## Non-functional requirements

The service should handle interrupted uploads safely, provide useful error messages, and meet the organisation’s availability and retention requirements. Exact performance targets must be agreed before implementation.

## Architecture and data flow

The client sends the file to the API over an authenticated connection. The API validates metadata and permission, stores the file in a restricted location, and starts required scanning. The file becomes available only after the configured checks succeed.

## Interfaces, schemas, and dependencies

The API contract defines multipart request fields, maximum size, supported media types, response states, and error codes. Dependencies include identity, object storage, scanning, and audit logging.

## Failure modes, security, and observability

Handle oversized files, unsupported media types, storage failures, scan rejection, and client disconnects. Treat the client-provided filename and content type as untrusted. Avoid logging file contents or secrets.

## Acceptance criteria and validation

Test accepted and rejected file types, size limits, permission boundaries, interrupted uploads, and scanning failures. Confirm rejected files cannot be retrieved through the normal access route.

## Open questions and exclusions

Confirm exact file limits, retention, encryption, and deletion rules. Malware-scanning implementation and long-term archival policy must be agreed with the relevant owners.
