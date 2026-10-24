# Troubleshooting: CSV import rejected

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide when a CSV upload fails validation. Keep the original file unchanged and use a copy for testing. Do not share records containing personal or confidential data in a public support channel.

## Symptoms and error identifiers

- Import reports missing required columns.
- Rows are rejected because values do not match expected types.
- The parser reports inconsistent row lengths or invalid quoting.

## Quick checks

1. Confirm that the file is in the documented format and encoding.
2. Compare the header row with the current schema.
3. Check whether the delimiter and quotation rules match the export settings.
4. Review the validation report for row and column references.

## Diagnostic decision steps

If a required column is missing, compare the header with the approved template. If dates or numbers are rejected, check the documented format and locale. If row lengths differ, inspect line breaks and quoting in the affected rows. Correct the source copy and rerun validation before importing.

## Cause-specific fixes

Export a fresh file using the supported format where possible. Do not rename columns or convert values in bulk unless the expected mapping is clear. If the file appears valid but still fails, provide a minimal redacted sample that reproduces the issue.

## Verification and prevention

Run validation on the corrected copy and confirm that the reported error is resolved. Compare row counts and key totals before proceeding with the import.

## Escalation details to collect

Include the importer version, error identifier, column and row number, file encoding if known, and a minimal redacted example. Never attach the full sensitive file unless the approved secure transfer process is used.
