# Incident report: failed application deployment

*Illustrative incident report. Replace all example details and timestamps with verified records; follow the organisation’s incident and privacy procedures.*

## Report structure

It records incident details and the timeline, separates confirmed facts from hypotheses, and documents recovery and corrective actions.

## Incident details and document control

Incident ID: REL-2026-027 | Date: 19 August | Service: Internal scheduling application | Status: Recovery verified; review open

## Executive incident summary

A deployment of the scheduling application failed its post-release health check. The release was rolled back, and service health returned to the previous baseline. The deployment package and environment configuration are being compared to determine why the check failed. The report records the containment and verification steps; a final root-cause statement should wait until the comparison and reproduction are complete.

## Scope and impact

The incident review covers the release attempt, rollback, and checks of the scheduling application. It excludes unrelated infrastructure alerts unless evidence links them to the failure.

## Timeline of events

16:40 — deployment started.
16:47 — post-release health check failed.
16:52 — release manager initiated rollback.
17:03 — previous version was running.
17:12 — health and basic scheduling flow verified. Replace with timestamps from the release log.

## Response and containment

The release manager halted the rollout and restored the previous version. The team checked application health and completed a basic scheduling transaction before confirming service recovery.

## Cause and contributing factors

The health-check failure is confirmed, but its cause is not. The investigation should compare dependency versions, environment configuration, and startup logs, then reproduce the failure in a non-production environment if possible.

## Recovery and verification

The previous version passed the health check and a basic scheduling flow. A full verification should also confirm scheduled jobs and data integrity before closing the incident.

## Corrective and preventive actions

1. Compare release artefacts and environment settings.
2. Add a deployment smoke test for the scheduling flow.
3. Document the rollback decision threshold.
4. Review whether the health check covers the dependency that failed.

## Final quality check

Separate confirmed facts from hypotheses, preserve relevant evidence, document impact only when verified, and assign an owner and due date to every corrective action. Review sensitive details before distribution.

## IELTS-oriented language practice

The report uses neutral, chronological language and avoids assigning blame before the evidence is reviewed. In a real incident report, factual accuracy and the approved reporting process take priority over stylistic complexity.
