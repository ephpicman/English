# ADR-001: Store uploaded files in object storage

*Illustrative architecture decision record. Validate the system context and implementation details before adopting this decision.*

## Title, status, date, owners

- **Status:** Accepted for the illustrative service; review before implementation.
- **Date:** 2026-03-12
- **Owners:** Platform team

## Context and problem

The service accepts user-uploaded reports that must remain available after an application instance restarts. Keeping files on a local disk couples data to a particular host and complicates replacement of instances. The design needs durable storage, controlled access, and a clear retention policy.

## Decision drivers

Durability across deployments; private-by-default access; predictable retrieval; manageable operating cost; support for lifecycle and deletion policies.

## Options considered

1. Local filesystem: simple, but difficult to share safely across instances and deployments. 2. Relational database blobs: transactional association is convenient, but large binary payloads increase database storage and backup pressure. 3. Object storage: separates file bytes from application compute and offers access controls and lifecycle policies, but requires careful permission and URL design.

## Decision

Use a private object-storage bucket for file bytes and keep only metadata, object keys, owner IDs, content type, size, and lifecycle state in the application database. Generate short-lived download links only after authorisation. The exact provider and retention settings must be chosen for the deployment environment.

## Consequences and trade-offs

The application must handle failed uploads, orphaned objects, and deletion consistency. Monitoring should track upload failures and storage growth. Access must not depend on an unguessable object key alone; authorisation is checked before issuing a download link.

## Follow-up and review triggers

Review if file sizes, retention obligations, residency requirements, or provider costs materially change. Before release, test permission boundaries, deletion behaviour, and recovery from interrupted uploads.

## Final quality check

Confirm that the status reflects an actual decision, alternatives were considered fairly, and the owner has approved the trade-offs. Record links to implementation issues and tests in the real repository.
