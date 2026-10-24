# ADR-003: Require structured logs for service errors

*Illustrative ADR; align it with logging, privacy, and retention policies.*

## Before drafting

Describe the operational problem and the intended benefit, not merely the preferred library.

## Document structure

This record captures drivers, alternatives, the decision, trade-offs, and review conditions.

## Title, status, date, owners

- **Status:** Proposed
- **Date:** 24 October 2026
- **Owners:** Service engineering team

## Context and problem

Error messages vary between components, making incidents difficult to investigate. Some messages lack a request identifier or consistent severity. The team needs searchable logs without collecting unnecessary sensitive information.

## Decision drivers

Consistent fields, correlation across components, readable messages, privacy, predictable volume, and compatibility with the existing platform.

## Options considered

1. Continue free-text logging: minimal change but limited consistency.
2. Structure all events: consistent but requires migration and conventions.
3. Structure critical events first: lower initial effort but leaves some gaps.

## Decision

Adopt a documented structured format for error events first, then extend it to high-value operational events. Include timestamp, service, environment, severity, event name, and a safe request identifier where available.

## Consequences and trade-offs

The team must maintain field conventions and apply redaction to every error path. Structured logging improves search but does not replace metrics, traces, or a required audit log.

## Follow-up and review triggers

Review sampled logs after the pilot. Revisit if cost, privacy risk, or searchability does not meet agreed operational needs.

## Final quality check

Confirm fields are supported and do not expose secrets or unnecessary personal data.
