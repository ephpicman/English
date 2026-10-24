# Technical specification: monthly report export

*Illustrative technical specification. Confirm schemas, security requirements, and acceptance criteria with the actual system owners before implementation.*

## Purpose, scope, and terminology

Specify a controlled export flow for a monthly reporting table. Scope includes selecting columns, applying filters, generating a CSV, and verifying that exported data matches the user’s authorised view.

## Background and goals

Users need a reproducible export and a way to distinguish an empty result from a failed operation. The design should preserve permissions and avoid silently exporting columns that were not selected.

## Functional requirements

FR-1: display the current filter and selected columns before export. FR-2: validate the column selection. FR-3: show a clear message when no rows match. FR-4: generate a UTF-8 CSV with documented quoting and date formats. FR-5: record export status without storing sensitive file contents in logs.

## Non-functional requirements

The export should have a documented row or file-size limit. Large exports should not block the main request indefinitely. Access control, retention, and deletion of generated files must follow the organisation’s data policy.

## Architecture and data flow

The user submits a request to the export service. The service revalidates permission and filters, queries the authorised dataset, writes the file to a controlled temporary location, and returns a download route. The download route rechecks access and expires according to an approved policy.

## Interfaces, schemas, and dependencies

Inputs include filter criteria, selected column IDs, and an optional reporting period. Output includes export ID, status, row count, and download availability. Exact schema, maximum size, storage provider, and expiry are deployment decisions that must be confirmed.

## Failure modes, security, and observability

Handle invalid columns, expired sessions, empty results, query timeouts, and file-generation failures separately. Log export IDs and error categories; do not log exported rows or secrets. Clean up partial files after failure.

## Acceptance criteria and validation

The export contains only authorised rows and selected columns; CSV escaping is correct for commas, quotes, and line breaks; empty results are clearly reported; and expired download links cannot be reused.

## Open questions and exclusions

Confirm maximum rows, file retention, whether background generation is required, and the policy for exporting personal data. Scheduled exports are out of scope.
