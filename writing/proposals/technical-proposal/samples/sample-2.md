# Technical proposal: idempotency for payment requests

*Illustrative technical proposal. Follow the actual payment-provider contract and security requirements.*

## Before you draft

This is a design proposal only. Confirm provider support, transaction semantics, and applicable compliance requirements before implementation.

## Draft structure

It describes the reliability problem, proposed controls, alternatives, rollout, and acceptance criteria.

## Title, version, and technical context

**Version:** Draft 0.1  
**Context:** Payment API integration  
**Date:** 24 October 2026  
**Status:** For architecture review

## Executive summary

Introduce idempotency handling for supported payment-creation requests so that a retry after a timeout does not unintentionally create a second transaction. The implementation must define key scope, retention, concurrency behaviour, and how the original result is returned.

## Problem statement and requirements

A network failure can leave a client uncertain whether a request completed. The API should allow safe retries for the same logical operation while preventing reuse of a key for a different request. It must distinguish an unknown outcome from a confirmed failure.

## Current architecture and constraints

The application sends payment requests to an external provider. Confirm support for idempotency keys, retention windows, and response replay. The proposal assumes the application can store a request fingerprint and transaction reference.

## Proposed design and rationale

Require an idempotency key for supported creation requests. Store the key with a fingerprint of the relevant request fields and the operation result. Repeating the same key and payload returns the recorded result; reusing a key with a different payload is rejected. Concurrent requests with the same key must be serialised or protected by an atomic uniqueness constraint.

## Alternatives and trade-offs

Client-only retry rules cannot prevent duplicates when the client loses a response. Server-side key storage adds state and retention requirements but offers stronger protection. The design must also handle partial failures between the application and provider.

## Implementation, testing, and migration

Document key format and retention, implement storage and concurrency control, and test repeated requests, changed payloads, simultaneous retries, and provider timeouts. Roll out gradually and reconcile transactions during the pilot.

## Security, reliability, and operational risks

Do not log payment credentials or sensitive payloads. Restrict access to idempotency records and define cleanup rules that preserve keys for the required retry window.

## Acceptance criteria and decision

Approve implementation only after provider semantics are confirmed. Acceptance requires duplicate-request tests, safe handling of key reuse, and a documented reconciliation process.

## Language and quality review

Verify the current provider contract and security requirements before treating this as implementation-ready.

## IELTS-oriented practice note

The proposal makes reliability assumptions explicit and defines the failure cases to test.
