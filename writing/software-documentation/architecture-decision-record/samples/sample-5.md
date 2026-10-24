# ADR-005: Version public API changes explicitly

*Illustrative architecture decision record. Validate the system context and implementation details before adopting this decision.*

## Title, status, date, owners

- **Status:** Accepted for externally consumed APIs.
- **Date:** 2026-07-17
- **Owners:** API working group

## Context and problem

External clients may upgrade on different schedules. A change that is harmless for the server can break clients if a field is renamed, a response type changes, or an existing behaviour disappears without notice.

## Decision drivers

Client compatibility; predictable deprecation; clear migration paths; manageable maintenance burden; accurate documentation.

## Options considered

1. Change responses in place: simplest for the server but risks breaking clients. 2. Version every minor change: highly explicit but can create unnecessary versions. 3. Preserve compatible additions and version breaking changes: balances continuity with evolution but requires a policy for deprecation.

## Decision

Keep additive, backward-compatible changes within the current major API version. Introduce a new version for breaking contract changes, document the migration, and announce a retirement date only after it has been approved and communicated to affected consumers.

## Consequences and trade-offs

The team must test old-version behaviour while it remains supported and maintain clear version-specific documentation. Versioning does not remove the need to define compatibility and deprecation policies.

## Follow-up and review triggers

Review the policy when client usage, support costs, or security requirements change. Before retiring a version, verify usage telemetry and provide a migration route.

## Final quality check

Confirm that the status reflects an actual decision, alternatives were considered fairly, and the owner has approved the trade-offs. Record links to implementation issues and tests in the real repository.
