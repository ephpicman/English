# ADR-003: Adopt structured application logs

*Illustrative architecture decision record. Validate the system context and implementation details before adopting this decision.*

## Title, status, date, owners

- **Status:** Accepted for services that emit operational logs.
- **Date:** 2026-05-21
- **Owners:** Reliability group

## Context and problem

Free-form log messages are difficult to search consistently across services. Troubleshooting often requires matching a request across components while avoiding accidental disclosure of personal or secret data.

## Decision drivers

Searchable fields; correlation across requests; consistent severity; redaction; compatibility with existing log collection.

## Options considered

1. Free-form text: low migration cost but inconsistent fields. 2. Structured JSON logs: predictable keys and easier filtering, but requires conventions and tooling. 3. Direct tracing only: useful for request paths but does not replace event logs for background jobs and operational conditions.

## Decision

Emit structured logs with timestamp, severity, service, environment, event name, and correlation ID. Add domain-specific fields only when useful. Do not log credentials, session tokens, full payment details, or unnecessary personal data.

## Consequences and trade-offs

Teams must agree on field names and redaction rules. Existing text searches may need updates, and log volume should be monitored. Correlation IDs must be propagated across asynchronous boundaries where practical.

## Follow-up and review triggers

Review after the first service migration and after any privacy incident or material change to the log pipeline. Add tests for sensitive-field redaction.

## Final quality check

Confirm that the status reflects an actual decision, alternatives were considered fairly, and the owner has approved the trade-offs. Record links to implementation issues and tests in the real repository.
