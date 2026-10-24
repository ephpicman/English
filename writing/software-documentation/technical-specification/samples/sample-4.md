# Technical specification: scheduled report generation

*Illustrative specification. Confirm data definitions, scheduling requirements, and access policy before implementation.*

## Purpose, scope, and terminology

Specify a service that generates a report for an agreed reporting period and makes the result available to authorised users. “Report period” is the data window being analysed; “generation time” is when the job runs.

## Background and goals

Manual report preparation can vary between operators and may use inconsistent date ranges. The goal is repeatable generation with traceable inputs and clear failure handling.

## Functional requirements

- Accept or derive a defined reporting period.
- Validate that required source data is available.
- Generate output using the approved report definition.
- Record job status, generation time, and source version where available.
- Notify the designated owner of success or failure through an approved channel.
- Prevent unauthorised users from accessing the generated report.

## Non-functional requirements

Jobs should be observable, restartable where safe, and protected from duplicate execution. Runtime limits and service-level expectations must be set from the actual workload.

## Architecture and data flow

A scheduler starts the job. The worker validates the period and source availability, generates the report, stores the output in an approved location, and records the result. A failed job should leave enough information for diagnosis without exposing sensitive report contents.

## Interfaces, schemas, and dependencies

Define the schedule, period format, output format, access rules, status model, and error contract. Dependencies include the source database, job scheduler, storage, and notification service.

## Failure modes, security, and observability

Handle missing data, query failures, storage errors, duplicate triggers, and permission changes. Logs should include safe job identifiers and status, not full sensitive rows.

## Acceptance criteria and validation

Test complete and incomplete periods, duplicate triggers, failed storage, and access restrictions. Compare output with a verified reference case before acceptance.

## Open questions and exclusions

Confirm time zone, retention, and handling of late-arriving data. Interactive report editing is outside scope.
