# Troubleshooting: background job appears stuck

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide for a queued job that has not completed within its normal window. Do not manually rerun a job with external side effects until its current state is understood.

## Symptoms and error identifiers

- Job remains queued or in progress beyond its expected duration.
- Retry count increases without completion.
- Downstream status does not reflect the expected result.

## Quick checks

1. Check the queue and worker health dashboards.
2. Look for a known dependency incident.
3. Identify the job ID and current state.
4. Check whether the job may already have completed an external action.

## Diagnostic decision steps

Review worker logs using the job ID and correlate them with the downstream service’s records. Determine whether the job is waiting, failing, or has an ambiguous outcome after a timeout. Check retry limits and dead-letter handling before taking action.

## Cause-specific fixes

If the job is safely retryable and the cause is transient, use the documented retry mechanism. If an external side effect may already have occurred, follow the reconciliation procedure rather than launching a duplicate job. Escalate persistent failures to the job owner.

## Verification and prevention

Confirm the job reaches a terminal state, the expected side effect occurs once under the supported idempotency model, and the queue returns to normal. Monitor the next scheduled run.

## Escalation details to collect

Provide job ID, enqueue time, attempt count, state transitions, dependency status, relevant correlation IDs, and whether any external side effect may have occurred. Redact payloads containing sensitive data.
