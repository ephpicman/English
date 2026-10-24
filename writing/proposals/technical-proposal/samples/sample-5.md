# Proposal for a structured customer-support handover

*Illustrative technical proposal. Verify operational facts, costs, and approvals before using it as a real decision document.*

## Before you draft

The proposal should identify the decision-maker, the problem to solve, and the evidence needed to judge whether the proposal succeeds.

## Draft structure

The sections below distinguish the current problem, the recommended approach, and the decision being requested.

## Title, version, and technical context

Proposal for a structured customer-support handover
Version: Draft 0.1 | Context: Internal workflow tooling | Date: 24 October 2026

## Executive summary

Introduce a concise handover template with issue summary, steps tried, current status, next action, owner, and customer update timing. This is a design proposal, not a claim that the change has been implemented or tested.

## Problem statement and requirements

Cases passed between support agents sometimes omit what has already been tested, the current status, or the next promised update.
Requirements: clear ownership, traceable status changes, access control, and a reversible pilot.

## Current architecture and constraints

The current process relies on existing collaboration tools and manual handoffs. Any integration, API, retention rule, and permission model must be confirmed against the actual platform before implementation.

## Proposed design and rationale

Introduce a concise handover template with issue summary, steps tried, current status, next action, owner, and customer update timing.

## Alternatives and trade-offs

Alternative 1: retain the current process with reminders—low setup effort but leaves ownership ambiguity. Alternative 2: introduce a shared structured workflow—moderate change effort and clearer state. Alternative 3: automate routing immediately—deferred until categories and exception handling are stable.

## Implementation, testing, and migration

Draft the template with agents, test it on one case category for two weeks, review handover quality, and adjust before rollout. Support operations owns the pilot.
Test required fields, permission boundaries, duplicate handling, and export or recovery behaviour before rollout. Document the migration and rollback path.

## Security, reliability, and operational risks

Too many required fields could slow urgent cases. Keep the template short and allow a clear urgent escalation path.

## Acceptance criteria and decision

Approve a two-week pilot and decide whether to expand based on agent feedback, handover completeness, and anonymised case review.
Acceptance requires a successful pilot, validated permissions, agreed ownership, and no unresolved critical workflow defect.

## Language and quality review

Confirm that assumptions are labelled, costs are based on actual estimates, risks have owners or mitigations, and the requested decision is explicit. Do not present the proposal as approved work.

## IELTS-oriented practice note

The document uses formal, decision-focused language and links the recommendation to a practical need. For a real proposal, follow the organisation’s required format and provide evidence appropriate to the decision.
