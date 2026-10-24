# Proposal for accessible community workshop registration

*Illustrative technical proposal. Verify operational facts, costs, and approvals before using it as a real decision document.*

## Before you draft

The proposal should identify the decision-maker, the problem to solve, and the evidence needed to judge whether the proposal succeeds.

## Draft structure

The sections below distinguish the current problem, the recommended approach, and the decision being requested.

## Title, version, and technical context

Proposal for accessible community workshop registration
Version: Draft 0.1 | Context: Internal workflow tooling | Date: 24 October 2026

## Executive summary

Create a standard event record containing date, duration, venue, access information, cost, registration steps, and a contact route. Reuse it across promotional channels. This is a design proposal, not a claim that the change has been implemented or tested.

## Problem statement and requirements

Event notices sometimes omit access details and the registration confirmation does not consistently explain what participants should expect.
Requirements: clear ownership, traceable status changes, access control, and a reversible pilot.

## Current architecture and constraints

The current process relies on existing collaboration tools and manual handoffs. Any integration, API, retention rule, and permission model must be confirmed against the actual platform before implementation.

## Proposed design and rationale

Create a standard event record containing date, duration, venue, access information, cost, registration steps, and a contact route. Reuse it across promotional channels.

## Alternatives and trade-offs

Alternative 1: retain the current process with reminders—low setup effort but leaves ownership ambiguity. Alternative 2: introduce a shared structured workflow—moderate change effort and clearer state. Alternative 3: automate routing immediately—deferred until categories and exception handling are stable.

## Implementation, testing, and migration

Draft the fields with outreach staff in week 1; test on two events in weeks 2–3; gather participant questions; revise before wider use. The outreach lead owns the record and the event organiser approves final details.
Test required fields, permission boundaries, duplicate handling, and export or recovery behaviour before rollout. Document the migration and rollback path.

## Security, reliability, and operational risks

The process may add work if the form is too long. Keep fields limited to information participants need and assign one person to approve publication.

## Acceptance criteria and decision

Approve a two-event pilot. Review correction requests, repeated enquiries, and optional participant feedback before standardising the form.
Acceptance requires a successful pilot, validated permissions, agreed ownership, and no unresolved critical workflow defect.

## Language and quality review

Confirm that assumptions are labelled, costs are based on actual estimates, risks have owners or mitigations, and the requested decision is explicit. Do not present the proposal as approved work.

## IELTS-oriented practice note

The document uses formal, decision-focused language and links the recommendation to a practical need. For a real proposal, follow the organisation’s required format and provide evidence appropriate to the decision.
