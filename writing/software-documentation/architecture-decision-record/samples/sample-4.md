# ADR-004: Keep API contracts in version control

*Illustrative ADR; confirm repository and release practices before adoption.*

## Before drafting

Explain how the decision supports compatibility and review, including maintenance costs.

## Document structure

The ADR documents the problem, criteria, alternatives, decision, consequences, and review triggers.

## Title, status, date, owners

- **Status:** Proposed
- **Date:** 24 October 2026
- **Owners:** API platform team

## Context and problem

API behaviour is described in several places, making changes difficult to compare across releases. Client teams need to review changes to fields, status codes, and error behaviour before they reach a shared environment.

## Decision drivers

Reviewability, history, compatibility checks, clear ownership, and alignment between documentation and implementation.

## Options considered

1. Shared document: easy to edit but weakly connected to code changes.
2. Version-controlled contract: reviewable and traceable but requires maintenance.
3. Fully generated contract: reduces duplication but may omit intended behaviour or produce unclear descriptions.

## Decision

Store the reviewed API contract in version control with changes reviewed alongside relevant code. Automation may validate the contract but should not silently rewrite it to match every implementation change.

## Consequences and trade-offs

The team must resolve conflicts between code and specification and assign an owner. Automated checks can detect mismatches but cannot decide whether a breaking change is acceptable.

## Follow-up and review triggers

Review after the first release using the contract in CI. Revisit if maintenance becomes excessive or the organisation adopts another source-of-truth process.

## Final quality check

Confirm format, ownership, and release review process before implementation.
