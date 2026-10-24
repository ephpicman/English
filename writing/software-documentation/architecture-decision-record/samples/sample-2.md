# ADR-002: Use a relational database for transactional records

*Illustrative ADR; confirm workload and operational constraints before adoption.*

## Before drafting

Record the decision and its alternatives so future maintainers can understand the rationale.

## Document structure

The record states the problem, drivers, alternatives, decision, consequences, and review conditions.

## Title, status, date, owners

- **Status:** Proposed
- **Date:** 24 October 2026
- **Owners:** Application architecture group

## Context and problem

The application stores related records that must remain consistent during updates. Orders, items, and processing states have relationships that need clear constraints and reliable transactions.

## Decision drivers

Transactional consistency, query flexibility, schema constraints, operational familiarity, backup, and recovery.

## Options considered

1. Relational database: supports relationships and transactions but requires schema management.
2. Document database: flexible records but may require extra care for cross-record consistency.
3. Flat files: simple for exports but unsuitable as a concurrent transactional source of truth.

## Decision

Use the organisation’s supported relational database for core transactional records. Confirm the engine, version, and schema through the implementation plan.

## Consequences and trade-offs

The team must manage migrations, indexes, connection limits, and recovery tests. The model requires planning as fields change, but it offers explicit constraints and familiar transaction handling.

## Follow-up and review triggers

Review if workload changes, write contention becomes a demonstrated bottleneck, or the data model no longer fits. Performance claims must come from representative benchmarks.

## Final quality check

Confirm the database is approved and operational ownership is assigned.
