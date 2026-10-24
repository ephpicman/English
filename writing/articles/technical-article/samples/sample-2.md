# Designing structured logs for reliable troubleshooting

*Illustrative technical article. Align examples with the project’s logging framework, privacy rules, and operational requirements.*

## Summary

Structured logs make operational events easier to search and correlate across services. Their value depends on consistent fields, useful event names, and careful handling of sensitive data. A practical logging design defines a small schema, propagates safe correlation identifiers, and tests redaction before events leave the application. This article explains the workflow and trade-offs; it does not prescribe a particular logging vendor or replace metrics and distributed tracing.

## Scope and Prerequisites

The intended audience is a software engineer responsible for application observability. The discussion assumes a service that emits application logs to a central system. Readers should understand basic request handling, error paths, and the organisation’s data classification policy. The final schema must fit the log platform’s supported fields, retention rules, and access controls.

## Core Concepts

A log event records something that happened at a point in time. Structured logging stores fields as machine-readable values rather than embedding every detail in an unstructured sentence. Common fields include timestamp, severity, service, environment, event name, and correlation ID. Domain-specific fields should be added only when they help answer a diagnostic question.

A correlation ID connects events associated with one request or workflow. It should be generated or validated at a trusted boundary and propagated through internal calls where practical. It is not an authentication token and should not grant access to records. Event names should describe a stable event, while changing values belong in separate fields.

## Architecture or Workflow

A request enters the service and receives a correlation identifier. The application emits events as it passes through validation, business logic, and downstream calls. If a dependency fails, the error event records a stable error category and correlation ID without dumping the full request body. Background jobs should preserve a job or workflow identifier across retries so that separate attempts can be connected.

Treat the schema as a contract shared by application code, log collectors, dashboards, and alerts. Define mandatory fields, types, severity values, and how missing optional values are represented. A field that is a string in one event and an object in another makes queries brittle. Changes to the schema should be reviewed with downstream dashboards and alerts.

## Implementation Details

An illustrative JSON event might look like this:

```json
{
  "timestamp": "2026-10-24T10:15:00Z",
  "severity": "ERROR",
  "service": "report-api",
  "event": "dependency_timeout",
  "correlation_id": "req_example_123",
  "dependency": "report-store"
}
```

The timestamp and identifier are synthetic. Configure the logger to emit valid structured records and standardise field names. Apply redaction before output, including exception paths where sensitive values may appear in error messages. Never log authorization headers, session tokens, passwords, or full payment details. If user-provided text is needed for diagnosis, follow the approved classification and redaction policy.

Use the logging platform’s parsing and query tools to verify that fields can be filtered and grouped as expected. Add tests for required fields, allowed severity values, and known sensitive patterns. Include a test where a secret appears in an exception message, not only in a successful request.

## Limitations and Operational Concerns

More logs are not automatically better. Excessive event volume increases cost and can obscure important signals. Correlation IDs may be lost across asynchronous boundaries unless explicitly propagated. Logging also needs retention and access controls appropriate to the data it contains. Decide what the application does if the collector is unavailable, how long events may be buffered, and whether high-volume repetitive errors need sampling.

Logs should not be the sole source of audit evidence when stronger integrity guarantees are required. They also cannot replace metrics for aggregate service health or traces for detailed cross-service timing.

## Conclusion

A useful logging system combines a stable schema, safe context, and a clear review process. Define which operational question each field answers, verify redaction, and test dashboards after schema changes. This keeps logs actionable without allowing sensitive data or unnecessary fields to accumulate.
