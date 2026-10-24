# Proposal to introduce a shared service-request queue

*Illustrative technical proposal. Verify operational facts, costs, and approvals before using it as a real decision document.*

## Before you draft

The proposal should identify the decision-maker, the problem to solve, and the evidence needed to judge whether the proposal succeeds.

## Draft structure

The sections below distinguish the current problem, the recommended approach, and the decision being requested.

## Title, version, and technical context

Proposal to introduce a shared service-request queue
Version: Draft 0.1 | Context: Internal workflow tooling | Date: 24 October 2026

## Executive summary

Pilot one shared queue for facilities requests with required fields for owner, status, next action, and due date. Keep urgent safety issues on the existing escalation route. This is a design proposal, not a claim that the change has been implemented or tested.

## Problem statement and requirements

Internal requests currently arrive through email and spreadsheets, making ownership and priority difficult to track.
Requirements: clear ownership, traceable status changes, access control, and a reversible pilot.

## Current architecture and constraints

The current process relies on existing collaboration tools and manual handoffs. Any integration, API, retention rule, and permission model must be confirmed against the actual platform before implementation.

## Proposed design and rationale

Pilot one shared queue for facilities requests with required fields for owner, status, next action, and due date. Keep urgent safety issues on the existing escalation route.

## Alternatives and trade-offs

Alternative 1: retain the current process with reminders—low setup effort but leaves ownership ambiguity. Alternative 2: introduce a shared structured workflow—moderate change effort and clearer state. Alternative 3: automate routing immediately—deferred until categories and exception handling are stable.

## Implementation, testing, and migration

Week 1: agree categories and permissions. Week 2: configure and test with sample requests. Weeks 3–6: run the pilot and gather feedback. Operations manager owns the review; team leads own status definitions.
Test required fields, permission boundaries, duplicate handling, and export or recovery behaviour before rollout. Document the migration and rollback path.

## Security, reliability, and operational risks

Risks include duplicate entry during transition and inconsistent use. Mitigate with a clear start date, short guide, and weekly review. Do not migrate sensitive records without confirming permissions.

## Acceptance criteria and decision

Approve a four-week pilot for one request category. Review whether requests have a named owner and next action, and decide whether to expand based on evidence.
Acceptance requires a successful pilot, validated permissions, agreed ownership, and no unresolved critical workflow defect.

## Language and quality review

Confirm that assumptions are labelled, costs are based on actual estimates, risks have owners or mitigations, and the requested decision is explicit. Do not present the proposal as approved work.

## IELTS-oriented practice note

The document uses formal, decision-focused language and links the recommendation to a practical need. For a real proposal, follow the organisation’s required format and provide evidence appropriate to the decision.
