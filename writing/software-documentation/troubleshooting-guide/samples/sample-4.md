# Troubleshooting: scheduled report was not generated

*Illustrative troubleshooting guide. Confirm the scheduler, job status, and reporting rules before retrying.*

## Scope and prerequisites

Use this guide when an expected scheduled report is missing. You need the report name, expected period, scheduled run time, and access to the approved job-status view.

## Symptoms and error identifiers

- No report appears in the output location.
- The job is marked failed or still running.
- The report exists but covers the wrong period.
- A notification was not received.

## Quick checks

1. Confirm the expected run date and time zone.
2. Check the job-status record.
3. Verify that the output location is correct.
4. Check whether the report is delayed rather than failed.

## Diagnostic decision steps

If no job started, check the scheduler status and the configured schedule. If the job failed, capture the error identifier and inspect approved logs. If a report exists with the wrong period, do not distribute it; confirm the period definition and source parameters first.

## Cause-specific fixes

- **Scheduler unavailable:** follow the operations recovery process.
- **Missing source data:** contact the data owner and wait for confirmation before rerunning.
- **Storage failure:** check the approved storage status and permissions.
- **Wrong period:** correct the configuration through the reviewed change process; do not edit a published report manually without recording the change.

## Verification and prevention

After recovery, confirm the report period, source version, and key totals before distribution. Record the incident and any follow-up change.

## Escalation details to collect

Provide report name, expected period, job ID, run time, error message, output location, and checks already completed. Do not attach sensitive report data to an unapproved ticket.
