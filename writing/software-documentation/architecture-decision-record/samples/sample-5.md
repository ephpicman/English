# ADR-005: Use feature flags for staged rollout

*Illustrative ADR; validate deployment platform and risk profile before adoption.*

## Before drafting

Explain why staged rollout is needed and when a flag should be removed.

## Document structure

The record compares deployment options and states the decision, trade-offs, and review triggers.

## Title, status, date, owners

- **Status:** Proposed
- **Date:** 24 October 2026
- **Owners:** Release engineering team

## Context and problem

Some changes affect workflows that are difficult to validate fully before deployment. A staged rollout can limit exposure while the team observes errors and user impact, provided the flag is controlled and its failure behaviour is understood.

## Decision drivers

Ability to limit exposure, clear rollback, operational simplicity, flag ownership, and configuration safety.

## Options considered

1. Deploy to all users at once: simple but exposes everyone if a serious issue appears.
2. Maintain long-lived branches: may delay integration and increase merge complexity.
3. Use a controlled feature flag: supports gradual exposure but adds configuration and cleanup work.

## Decision

Use a feature flag when a change has a clear staged-release need. Define the owner, default state, rollout criteria, monitoring, and removal date before enabling it.

## Consequences and trade-offs

Test both enabled and disabled paths and remove obsolete flags. A flag is not a substitute for access control; sensitive functionality still needs server-side authorisation.

## Follow-up and review triggers

Review the rollout after release and remove the flag when the change is fully adopted or cancelled. Revisit if flag complexity obscures system behaviour.

## Final quality check

Confirm flag defaults, permissions, monitoring, and rollback behaviour with the release owner.
