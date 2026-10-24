# A university mentoring programme

## Status
Accepted

## Context
The service needs to handle a university mentoring programme reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---
