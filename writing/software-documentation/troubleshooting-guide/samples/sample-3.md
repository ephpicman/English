# Troubleshooting: export file is empty

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide when a report export completes but contains no rows. You need permission to view the report and the filter settings used for the export.

## Symptoms and error identifiers

- Downloaded CSV contains only a header row.
- The interface shows zero matching records.
- The preview and downloaded file appear to disagree.

## Quick checks

1. Check the selected date range and filters.
2. Confirm the intended columns and dataset.
3. Compare the visible row count with the export preview.
4. Check whether the report data has refreshed.

## Diagnostic decision steps

Clear optional filters one at a time to identify whether a filter removes all rows. Confirm the user has permission to view the expected records. If the preview shows rows but the file does not, capture the export ID and check whether generation completed successfully.

## Cause-specific fixes

Correct the filter or date range if it was entered incorrectly. If the source data has not refreshed, follow the report owner’s refresh process. If preview and export differ under the same settings, do not repeatedly export sensitive data; escalate with the export ID.

## Verification and prevention

Run the export again with the confirmed filters and compare its row count with the preview. Check a small number of non-sensitive records against the source report.

## Escalation details to collect
If the export mismatch recurs, compare the report definition and data refresh timestamp before investigating individual records. A change in the source schema or filter logic may affect multiple exports. Keep the original file and a redacted example of the mismatch until the report owner confirms the cause. Avoid making manual corrections to the export without recording the transformation, because doing so can make later reconciliation difficult. Once the problem is fixed, rerun the validation and record which check confirms that the exported data is consistent.

Provide report name, export ID, time, selected filters, preview row count, downloaded row count, and any error message. Redact data values and credentials.
