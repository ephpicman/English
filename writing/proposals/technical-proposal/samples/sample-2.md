# Proposal to improve onboarding guidance

*Illustrative technical proposal. Verify operational facts, costs, and approvals before using it as a real decision document.*

## Before you draft

The proposal should identify the decision-maker, the problem to solve, and the evidence needed to judge whether the proposal succeeds.

## Draft structure

The sections below distinguish the current problem, the recommended approach, and the decision being requested.

## Title, version, and technical context

Proposal to improve onboarding guidance
Version: Draft 0.1 | Context: Internal workflow tooling | Date: 24 October 2026

## Executive summary

Consolidate the five most-used onboarding tasks into task-based guides, name a content owner for each, and add a quarterly link review. This is a design proposal, not a claim that the change has been implemented or tested.

## Problem statement and requirements

New colleagues receive the same setup instructions in several places, and some pages list prerequisites after the steps that depend on them.
Requirements: clear ownership, traceable status changes, access control, and a reversible pilot.

## Current architecture and constraints

The current process relies on existing collaboration tools and manual handoffs. Any integration, API, retention rule, and permission model must be confirmed against the actual platform before implementation.

## Proposed design and rationale

Consolidate the five most-used onboarding tasks into task-based guides, name a content owner for each, and add a quarterly link review.

## Alternatives and trade-offs

Alternative 1: retain the current process with reminders—low setup effort but leaves ownership ambiguity. Alternative 2: introduce a shared structured workflow—moderate change effort and clearer state. Alternative 3: automate routing immediately—deferred until categories and exception handling are stable.

## Implementation, testing, and migration

Select guides in week 1; revise drafts in weeks 2–3; test with new readers in week 4; revise and publish in week 5. People operations coordinates; page owners validate procedures.
Test required fields, permission boundaries, duplicate handling, and export or recovery behaviour before rollout. Document the migration and rollback path.

## Security, reliability, and operational risks

A guide may become stale if ownership is unclear or linked policies change. Assign owners and include a review date; do not duplicate policy text that is maintained elsewhere.

## Acceptance criteria and decision

Approve a five-guide pilot. Expand only if readers can locate the correct steps and content owners can maintain the pages within the agreed effort.
Acceptance requires a successful pilot, validated permissions, agreed ownership, and no unresolved critical workflow defect.

## Language and quality review

Confirm that assumptions are labelled, costs are based on actual estimates, risks have owners or mitigations, and the requested decision is explicit. Do not present the proposal as approved work.

## IELTS-oriented practice note

The document uses formal, decision-focused language and links the recommendation to a practical need. For a real proposal, follow the organisation’s required format and provide evidence appropriate to the decision.
