# ADR-002: Use cursor pagination for activity feeds

*Illustrative architecture decision record. Validate the system context and implementation details before adopting this decision.*

## Title, status, date, owners

- **Status:** Accepted for feeds ordered by creation time.
- **Date:** 2026-04-08
- **Owners:** Application team

## Context and problem

The activity feed can grow continuously, and users may request older records while new records are being inserted. Offset pagination becomes more expensive at large offsets and can shift records between pages when new items arrive.

## Decision drivers

Stable navigation during inserts; bounded query work; simple client continuation; deterministic ordering; support for an index-backed query.

## Options considered

1. Offset pagination: easy to understand and jump to a page, but deep offsets can be costly and inserts can shift page boundaries. 2. Cursor pagination: efficient for ordered traversal and more stable across inserts, but does not naturally support jumping to an arbitrary page. 3. Time-window queries: useful for reports but require clients to manage boundaries and ties.

## Decision

Use an opaque cursor based on the last record's creation timestamp and unique ID, ordered by timestamp descending and ID descending. Encode or sign the cursor so clients cannot alter query state. Document that the feed supports next-page traversal rather than arbitrary page numbers.

## Consequences and trade-offs

The query needs a composite index matching the ordering. Clients must treat cursors as opaque and handle an empty next-page result. Records edited after publication may still appear in a later position only if the feed semantics explicitly allow that behaviour.

## Follow-up and review triggers

Revisit if product requirements demand arbitrary page jumps, sorting by multiple user-selected fields, or a feed that reflects live edits in a different way. Test timestamp ties and inserts between page requests.

## Final quality check

Confirm that the status reflects an actual decision, alternatives were considered fairly, and the owner has approved the trade-offs. Record links to implementation issues and tests in the real repository.
