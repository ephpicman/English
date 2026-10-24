# ADR-004: Keep background jobs idempotent

*Illustrative architecture decision record. Validate the system context and implementation details before adopting this decision.*

## Title, status, date, owners

- **Status:** Accepted for retryable jobs.
- **Date:** 2026-06-02
- **Owners:** Backend team

## Context and problem

Background workers can retry after a timeout even when the first attempt completed part of its work. Without safeguards, retries may send duplicate notifications, create duplicate records, or apply a change more than once.

## Decision drivers

Safe retries; clear job state; observable failures; compatibility with queue delivery semantics; minimal duplicate side effects.

## Options considered

1. Disable retries: avoids some duplicates but loses transient failures. 2. Retry without deduplication: simple but unsafe for side effects. 3. Idempotency keys and state transitions: requires additional state but makes repeat execution safer. 4. Exactly-once processing claims: difficult to guarantee across external systems and should not be assumed without specific support.

## Decision

Design each retryable job so repeated execution with the same job or business key does not repeat completed side effects. Use unique constraints or idempotency records for internal writes, and use provider-supported idempotency mechanisms for external calls when available.

## Consequences and trade-offs

Job handlers need explicit states and retention rules for deduplication records. Some external effects cannot be made perfectly atomic; operators need a reconciliation path for ambiguous outcomes.

## Follow-up and review triggers

Review when a job gains a new external side effect, changes its idempotency key, or handles higher-value transactions. Test retries after partial completion and after network timeouts.

## Final quality check

Confirm that the status reflects an actual decision, alternatives were considered fairly, and the owner has approved the trade-offs. Record links to implementation issues and tests in the real repository.
