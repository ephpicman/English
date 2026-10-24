# Architecture Decision Record: Five Examples

Five original examples for **Architecture Decision Record**, written for the genre and audience implied by the corresponding template. Names, dates, and metrics are illustrative; adapt them to the real brief.

---

## Example 1: A university mentoring programme

## Status
Accepted

## Context
The service needs to handle a university mentoring programme reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---

## Example 2: A missed project deadline

## Status
Accepted

## Context
The service needs to handle a missed project deadline reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---

## Example 3: A new colleague

## Status
Accepted

## Context
The service needs to handle a new colleague reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---

## Example 4: A university course

## Status
Accepted

## Context
The service needs to handle a university course reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---

## Example 5: A workplace policy

## Status
Accepted

## Context
The service needs to handle a workplace policy reliably without delaying interactive requests. The existing synchronous design creates variable response times during peak usage.

## Decision
Use a managed queue and idempotent workers. Assign each task a stable identifier and retry transient failures with bounded exponential backoff.

## Consequences
This improves responsiveness and observability but introduces queue operations and eventual consistency. Monitor queue depth, processing latency and retry rates before increasing traffic.

---

## Final review checklist

- The example matches the purpose and audience of the genre.
- Structure, register and requested outcome are clear.
- Replace illustrative names, dates and figures before real-world use.
- Compare the example with the sibling `template.md` and tailor it to the actual brief.