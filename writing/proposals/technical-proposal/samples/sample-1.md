# Technical proposal: cursor pagination for an activity feed

*Illustrative technical proposal. Verify schema, database behaviour, and API conventions against the actual implementation.*

## Before you draft

This proposal describes a design option for an activity-feed endpoint; it is not a verified implementation specification.

## Draft structure

It defines requirements, current constraints, proposed design, alternatives, rollout, and acceptance criteria.

## Title, version, and technical context

**Version:** Draft 0.1  
**Context:** HTTP API for an activity feed  
**Date:** 24 October 2026  
**Status:** For technical review

## Executive summary

Use cursor-based pagination for a feed ordered by a stable timestamp and unique identifier. The client requests a page using an opaque cursor returned by the server. Correctness depends on deterministic ordering and clear behaviour when records are inserted or removed between requests.

## Problem statement and requirements

The endpoint must return a bounded number of records, support continuation, validate malformed cursors, and avoid exposing internal database details. Requirements should specify behaviour when new activity arrives between requests and whether the API promises a stable snapshot.

## Current architecture and constraints

The existing API returns activity in descending creation order. Confirm the schema, index coverage, and query plan before implementation. This proposal assumes the service can order by a timestamp plus a unique immutable ID.

## Proposed design and rationale

Return an opaque continuation token when more results may be available. The token represents the last returned ordering key, such as a timestamp and unique ID pair, and is validated by the server. The next query selects records strictly after that key in the chosen ordering. The cursor is not an authorization credential; normal access-control filters must run for every request.

## Alternatives and trade-offs

Offset pagination is straightforward but can become expensive for deep pages and may shift when records change. A timestamp-only cursor can skip or duplicate records with equal timestamps. A composite key is more deterministic but requires an appropriate index and careful query logic.

## Implementation, testing, and migration

Confirm the ordering key and index, implement cursor encoding and validation, and test equal timestamps, deleted records, malformed tokens, and records inserted between requests. Preserve the existing response contract during a staged rollout if clients depend on it.

## Security, reliability, and operational risks

Validate client input, limit page size, and avoid putting sensitive data in the token. Monitor latency and error rates during rollout.

## Acceptance criteria and decision

Approve a prototype after the database owner confirms the query plan. Acceptance requires deterministic ordering, documented cursor behaviour, consistent access control, and passing edge-case tests.

## Language and quality review

Adapt all assumptions to the actual API specification before implementation.

## IELTS-oriented practice note

The proposal explains the design, trade-offs, and conditions that must be verified.
