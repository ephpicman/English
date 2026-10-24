# Incident report: internal dashboard unavailable

*Illustrative incident report. Replace all example details and timestamps with verified records and follow the organisation’s incident process.*

## Before drafting

Confirm the incident record, reporting time zone, affected service, and the evidence available. Keep hypotheses separate from confirmed findings.

## Report structure

This report records impact and timeline, documents containment, and lists corrective actions without assigning unsupported blame.

## Incident details and document control

- **Incident ID:** INC-2026-041
- **Date:** 12 October 2026
- **Service:** Internal reporting dashboard
- **Reporter:** Service desk
- **Status:** Resolved; follow-up investigation open
- **Version:** 1.0

## Executive incident summary

The reporting dashboard became unavailable to some internal users during the morning reporting window. Access was restored after the service team restarted the affected application component. The immediate service interruption has ended, but the underlying cause has not been confirmed.

## Scope and impact

Users reported that the dashboard did not load. The impact was limited to dashboard access based on current reports; no evidence of data loss has been identified. The duration and number of affected users should be confirmed from monitoring and service-desk records before the report is finalised.

## Timeline of events

| Time (local) | Event | Source / action |
|---|---|---|
| 09:12 | First user report received | Service-desk ticket |
| 09:20 | Monitoring alert reviewed | Operations log |
| 09:35 | Application component restarted | Operations record |
| 09:48 | Dashboard access restored for test user | Verification note |
| 10:15 | Service desk asked users to retry | Internal notice |

## Response and containment

The operations team reviewed the alert, restarted the affected component, and checked access with a test account. The service desk communicated the recovery status to users. Further checks are needed to confirm that access remained stable after the initial verification.

## Cause and contributing factors

The cause is not yet confirmed. The team is reviewing application logs and recent changes. A resource constraint is one hypothesis, but it should not be recorded as the root cause unless the evidence supports it.

## Recovery and verification

The test account could access the dashboard after the restart. The operations team should review monitoring for the remainder of the day and confirm whether any scheduled reports were missed.

## Corrective and preventive actions

- Review application logs and identify the trigger — Operations lead — 16 October.
- Check monitoring thresholds and alert routing — Service owner — 19 October.
- Document the recovery procedure if the investigation confirms it is appropriate — Operations team — after review.

## Final quality check

Confirm timestamps, scope, and impact with the source records before closing the incident.

## IELTS-oriented language practice

The report separates the confirmed recovery action from the unverified root-cause hypothesis.
