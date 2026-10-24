# Technical specification: notification delivery

*Illustrative technical specification. Confirm schemas, security requirements, and acceptance criteria with the actual system owners before implementation.*

## Purpose, scope, and terminology

Specify a notification workflow for sending an event-triggered email while avoiding duplicate sends and exposing delivery status. The scope covers event intake, queueing, delivery attempts, and operational review.

## Background and goals

Transient failures can cause a worker to retry after an external provider has accepted a message. Without idempotency, this may result in duplicate notifications. The system needs clear state and a recovery path for ambiguous outcomes.

## Functional requirements

FR-1: accept a notification event with a stable business key. FR-2: validate recipient and template inputs. FR-3: enqueue delivery work. FR-4: record attempt state and provider response category. FR-5: suppress duplicate processing for the same logical event where the provider or internal store supports it.

## Non-functional requirements

Delivery should be observable without logging message bodies or secrets. Retry policy must be bounded and configurable. The system must support rate limits and safe operation during provider outages.

## Architecture and data flow

An application event is validated and stored with an idempotency key. A worker claims the event, renders an approved template, and calls the provider. The worker records success or a classified failure. Ambiguous outcomes are reconciled rather than retried blindly.

## Interfaces, schemas, and dependencies

Event fields include event ID, recipient reference, template ID, locale, and approved variables. Provider-specific request and response schemas must be documented separately. Credentials are retrieved from the approved secret store.

## Failure modes, security, and observability

Distinguish permanent validation failures, rate limiting, transient network errors, and unknown delivery outcomes. Use exponential backoff where appropriate and a review queue for exhausted retries. Redact recipients and provider tokens in logs.

## Acceptance criteria and validation

Repeated delivery of the same event does not create duplicate sends under the supported idempotency model; retries stop at the configured limit; failures are observable; and secrets do not appear in logs.

## Open questions and exclusions

Confirm retention of delivery records, provider idempotency support, recipient preferences, and unsubscribe requirements. SMS and push notifications are out of scope.
