# Technical specification: secure file upload

*Illustrative technical specification. Confirm schemas, security requirements, and acceptance criteria with the actual system owners before implementation.*

## Purpose, scope, and terminology

Define a server-side file upload flow for authenticated users. Scope includes validation, storage, metadata, access control, and deletion. It does not include content editing or public sharing.

## Background and goals

Uploaded files must persist across application restarts and remain accessible only to authorised users. Local disk storage is not sufficient for a multi-instance deployment unless a shared persistent volume is deliberately designed.

## Functional requirements

FR-1: accept only documented file types and size limits. FR-2: validate the user’s permission before accepting an upload. FR-3: store metadata including owner, object key, size, type, and status. FR-4: provide an authorised download path. FR-5: support deletion according to retention rules.

## Non-functional requirements

Files must be private by default. Upload and download operations need timeouts, size limits, and monitoring. The service must not trust a client-supplied filename or MIME type as the sole validation signal.

## Architecture and data flow

The client requests an upload operation; the service authorises the user and issues a constrained upload route or accepts the file through the application. The file is stored in private object storage, while metadata is recorded in the database. Downloads require a fresh access check before a short-lived link is issued.

## Interfaces, schemas, and dependencies

Metadata schema includes file ID, owner ID, storage key, media type, byte size, creation time, and lifecycle state. Storage provider, allowed MIME types, maximum size, and malware scanning requirements must be confirmed for the deployment.

## Failure modes, security, and observability

Reject oversized or unsupported files, handle interrupted uploads, and clean up orphaned objects. Never log file contents or signed URLs. Audit permission failures and suspicious upload patterns according to the security policy.

## Acceptance criteria and validation

Unauthorised users cannot retrieve a file by guessing its ID; unsupported files are rejected; interrupted uploads do not appear as complete; and deletion removes access according to the retention policy.

## Open questions and exclusions

Confirm retention period, scanning requirements, data residency, and whether external users can upload. Public sharing and file conversion are excluded.
