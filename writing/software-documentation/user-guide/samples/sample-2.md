# User guide: prepare a monthly CSV export

*Illustrative user guide. Verify interface labels and supported procedures against the deployed product.*

## Purpose and audience

This guide explains how an authorised analyst can prepare a CSV export from a reporting table and verify that the file matches the selected filters.

## Prerequisites and access

You need permission to view the report and export its data. Confirm that the data may be stored and shared in the intended location before downloading it.

## Concepts / interface overview

Filters determine which records are included; selected columns determine which fields appear in the file. A preview may show the expected result before generation. Export permissions may differ from view permissions, depending on the system.

## Task-based procedure

1. Open the report and confirm the reporting period.
2. Apply the required filters and inspect the result count.
3. Select only the columns needed for the task.
4. Review the preview and start the export.
5. Download the generated file from the approved location.
6. Compare the row count and key totals with the report before using the data.

## Expected results and verification

The downloaded CSV should contain the selected columns and records matching the filters. Check the header row, encoding, and date format before importing the file into another tool.

## Troubleshooting and limitations

If the file is empty, review filters and data refresh status. If the preview and file differ, record the export ID and contact the report owner. Do not share the export in an unapproved location.

## Related tasks / next steps
Before generating an export for wider use, confirm that each selected column is necessary for the intended task. A file may contain more information than the reader needs, and downloaded data can be harder to control than data viewed inside the application. Store the file only in an approved location and follow the organisation’s retention rules. If the report includes sensitive or personal information, confirm that the recipient is authorised to receive it. For repeat exports, record the report version and filter settings so another analyst can reproduce the result. If totals differ from the source, stop and investigate the discrepancy rather than editing the CSV to make it appear consistent.

For repeat reporting, document the filter settings and source version. For validation failures, use the CSV import troubleshooting guide.
