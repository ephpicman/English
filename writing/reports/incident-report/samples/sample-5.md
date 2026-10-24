# Incident report: scheduled report delivered with incorrect date range

*Illustrative report. Verify the report version, distribution list, and data range before circulation.*

## Before drafting

Use the published report, query parameters, and distribution record to establish what happened. Avoid estimating the impact without checking downstream use.

## Report structure

The report describes the incorrect output, correction, potential impact, and controls to prevent recurrence.

## Incident details and document control

- **Incident ID:** DATA-2026-012
- **Date:** 22 October 2026
- **System:** Monthly operations report
- **Reporter:** Reporting analyst
- **Status:** Corrected copy issued; review open
- **Version:** 1.0

## Executive incident summary

The monthly operations report was distributed with a date filter that excluded the final two days of the reporting period. The analyst identified the issue during a subsequent check, corrected the filter, and issued a replacement version. The team is checking whether any decisions were made using the first copy.

## Scope and impact

The report covered the service-request summary for October. Because the filter omitted two days, totals and category counts may have been understated. The exact difference must be confirmed by comparing the original and corrected outputs. No claim should be made about downstream impact until recipients have been asked whether they used the first version.

## Timeline of events

| Time (local) | Event | Source / action |
|---|---|---|
| 09:00 | Initial report generated | Report log |
| 09:25 | Report distributed | Email record |
| 10:10 | Date-range issue noticed | Analyst note |
| 10:30 | Corrected report generated and checked | Revision record |
| 10:45 | Replacement copy sent with correction notice | Email record |

## Response and containment

The analyst corrected the date filter, compared the revised totals, and issued a replacement copy that clearly identified the earlier version as superseded. Recipients were asked to use the corrected report for future reference.

## Cause and contributing factors

The initial review indicates that the saved query retained the previous reporting period’s end date. The team should verify this against the query history and review why the standard validation did not detect the missing days.

## Recovery and verification

The corrected report includes the full intended period. The reporting owner should confirm that the date range and totals match the source records before the incident is closed.

## Corrective and preventive actions

- Verify query history and document the cause — Reporting analyst — 23 October.
- Add a reporting-period check to the pre-send checklist — Report owner — 27 October.
- Ask recipients whether the original copy informed a decision — Operations manager — 28 October.

## Final quality check

Confirm the corrected file is the current version and the impact review is recorded.

## IELTS-oriented language practice

The report describes the known data error and leaves downstream consequences open until verified.
