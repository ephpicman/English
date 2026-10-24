# Incident report: duplicate notification emails

*Illustrative incident report. Replace all example details and timestamps with verified records; follow the organisation’s incident and privacy procedures.*

## Report structure

It records incident details and the timeline, separates confirmed facts from hypotheses, and documents recovery and corrective actions.

## Incident details and document control

Incident ID: INC-2026-052 | Date: 3 November | Component: Notification worker | Status: Under investigation

## Executive incident summary

Some users received duplicate notification emails for a single event. The team paused the affected worker and inspected recent job records to limit further duplicates. The incident appears related to retry handling, but the precise sequence must be confirmed before assigning root cause. The immediate priority is to protect users from repeated messages, identify affected events, and add a tested safeguard against duplicate processing.

## Scope and impact

The review covers outbound notifications produced by the worker during the reported window. It does not include unrelated email delivery delays. The affected-user count and time range must be established from delivery logs before notification or remediation is finalised.

## Timeline of events

14:02 — support received the first duplicate-email report.
14:10 — on-call staff compared reports with worker logs.
14:18 — worker paused to prevent additional sends.
14:31 — team identified jobs with repeated processing attempts.
15:05 — controlled processing resumed for a limited test batch. Replace these example times with confirmed logs.

## Response and containment

The worker was paused, recent job IDs were collected, and the team compared queued jobs with delivery records. A limited test batch was used before normal processing resumed. Any user-facing communication should describe the confirmed impact and avoid speculating about the cause.

## Cause and contributing factors

A retry after an ambiguous delivery response is a plausible contributor: the provider may have accepted a message even when the worker did not receive confirmation. This remains a hypothesis until queue, worker, and provider records are correlated.

## Recovery and verification

Recovery requires confirming that normal notifications are processed once, that the queue is draining at an expected rate, and that no additional duplicate pattern is present. The team should continue monitoring after resumption.

## Corrective and preventive actions

1. Correlate job IDs with provider delivery records.
2. Add idempotency protection for notification events where supported.
3. Test the timeout-after-acceptance scenario.
4. Prepare a user-impact review using confirmed counts and an approved communication plan.

## Final quality check

Separate confirmed facts from hypotheses, preserve relevant evidence, document impact only when verified, and assign an owner and due date to every corrective action. Review sensitive details before distribution.

## IELTS-oriented language practice

The report uses neutral, chronological language and avoids assigning blame before the evidence is reviewed. In a real incident report, factual accuracy and the approved reporting process take priority over stylistic complexity.
