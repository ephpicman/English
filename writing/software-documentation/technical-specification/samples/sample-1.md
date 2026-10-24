# Technical specification: ticket intake queue

*Illustrative specification. Confirm schemas, security requirements, and acceptance criteria with system owners before implementation.*

## Purpose, scope, and terminology

Define a shared intake workflow for internal service requests. Scope includes creating a request, assigning ownership, changing status, and recording the next action. The requester submits work; the owner is accountable for the next action; status describes the workflow state.

## Background and goals

Requests currently arrive through several channels, making ownership and status difficult to track. The goal is one authorised record for each request, with clear responsibility and traceable changes.

## Functional requirements

- A requester can submit a request with a category and description.
- Each active request has an owner, status, and next action.
- Changes to status and ownership are recorded with timestamp and actor.
- Users can view only requests permitted by their role.
- Urgent safety incidents continue through the existing emergency route.

## Non-functional requirements

The workflow should be usable on supported browsers, provide accessible form labels, and return clear validation errors. Performance targets, availability expectations, and retention periods must be set by the service owner rather than guessed.

## Architecture and data flow

The client submits the request to an authenticated API. The service validates fields and permissions, stores the record, and returns a reference. Status changes are processed through the same service so that access checks and audit rules are applied consistently.

## Interfaces, schemas, and dependencies

Required fields, status values, and error responses must be documented in the API contract. Dependencies include identity management, the approved database, and notification services if notifications are included in scope.

## Failure modes, security, and observability

Handle invalid input, unavailable storage, duplicate submissions, and permission failures. Do not log secrets or unnecessary personal information. Record enough safe diagnostic context to investigate failures.

## Acceptance criteria and validation

Test valid and invalid submissions, role-based access, status transitions, and audit records. Acceptance requires each active request to have an owner and next action and for unauthorised access to be denied.

## Open questions and exclusions

Confirm notification behaviour, retention, and reporting needs. Automated assignment and integration with external service desks are excluded from the first version unless separately approved.
