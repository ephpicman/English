# ADR-001: Store uploaded files in object storage

*Illustrative ADR; validate the actual system context before adopting.*

## Before drafting

Record why the decision is needed and what alternatives were considered.

## Document structure

This record captures context, drivers, options, decision, trade-offs, and review triggers.

## Title, status, date, owners

- **Status:** Proposed
- **Date:** 24 October 2026
- **Owners:** Platform team

## Context and problem

Uploaded reports must remain available when an application instance restarts. Local disk storage couples files to one host and complicates replacement of instances. The design needs durable storage, controlled access, and a clear retention policy.

## Decision drivers

Durability, private-by-default access, predictable retrieval, operating cost, and support for lifecycle and deletion policies.

## Options considered

1. Local filesystem: simple but difficult to share safely across instances.
2. Database blobs: transactional but may increase database and backup load.
3. Object storage: separates files from application instances but adds a service dependency and access-policy work.

## Decision

Use the organisation’s approved object-storage service for file content and keep metadata in the application database. Objects remain private by default and are accessed through the application’s authorisation flow.

## Consequences and trade-offs

The application must handle storage failures, permissions, retention, deletion, and recovery. This reduces coupling to local disks but does not remove the need for backups and access reviews.

## Follow-up and review triggers

Confirm encryption, lifecycle rules, backup strategy, and deletion behaviour with platform and security owners. Review if access patterns, regulatory requirements, or cost change materially.

## Final quality check

Verify infrastructure and implementation details before treating this decision as accepted.
