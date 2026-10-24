# Troubleshooting: application starts but shows a blank page

*Illustrative troubleshooting guide. Use only diagnostics approved for the application and environment.*

## Scope and prerequisites

Use this guide when the application opens but displays a blank or incomplete page. Record the browser, application version, time, and any visible error. Do not collect private browsing data beyond what support needs.

## Symptoms and error identifiers

- The page shell loads but content is missing.
- A spinner continues without finishing.
- The browser console shows a failed request.
- The issue occurs only for one account or environment.

## Quick checks

1. Confirm the correct environment and address.
2. Refresh once and check service status.
3. Ask whether other users see the same issue.
4. Record the failed request identifier or error message, if available.

## Diagnostic decision steps

If multiple users are affected, check service health and recent deployments before asking everyone to change local settings. If only one browser is affected, test in a supported browser or private session if policy permits. If the page fails after authentication, check the relevant application logs using the request identifier.

## Cause-specific fixes

- **Service outage:** follow the incident notice and avoid repeated refreshes.
- **Stale local assets:** use the approved cache-clearing steps, if available.
- **Permission failure:** verify the account’s access through the normal process.
- **Backend request error:** escalate with the failed request details rather than guessing at a fix.

## Verification and prevention

Confirm the page displays the expected content and the user can complete the original task. If the issue followed a release, link the incident to the deployment record.

## Escalation details to collect

Provide time and time zone, browser and version, environment, request ID, affected route, and steps to reproduce. Redact tokens and personal data from screenshots.
