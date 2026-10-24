# Troubleshooting: application starts but a page fails

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide when the application process starts but one page or route returns an error. You need the application version, environment, and a safe way to reproduce the request.

## Symptoms and error identifiers

- The home page loads but a specific route fails.
- Browser console shows a client error.
- Network tools show a failed API request.

## Quick checks

1. Confirm whether the failure occurs in another supported browser.
2. Check the application status and recent deployment notice.
3. Refresh once and record the exact error; avoid repeated actions that may submit a form twice.
4. Check whether the issue affects one account or all users.

## Diagnostic decision steps

Use browser developer tools to identify the failing request and status code, but do not copy cookies or authorization headers into a ticket. Compare the route and API response with the documented contract. If the problem began after a deployment, check the release notes and approved rollback criteria.

## Cause-specific fixes

For a missing asset, check the configured base path and deployment output. For an API error, follow the response’s documented remediation and involve the service owner if permissions or server behaviour are involved. Do not bypass access checks to make the page load.

## Verification and prevention

Retest the affected route with a permitted account and confirm that related actions still work. Check that the fix does not expose data to a user who should not have access.

## Escalation details to collect
After restoring the route, test the affected page and a related action with an authorised account. If the failure was caused by a deployment, record the release reference and the decision to roll back or proceed. This helps the team learn from the incident and prevents an informal workaround from becoming the permanent procedure.
Before escalating, check whether the failure occurs on a direct route refresh as well as through in-app navigation. This can distinguish a client-side routing problem from a failed API request, although the result is only a clue. If the issue follows a recent deployment, follow the approved incident process rather than applying an unreviewed workaround. After a fix, test the original action and one related workflow so that the change has not simply moved the failure elsewhere. Keep the reproduction steps concise and avoid including user data that is not needed to diagnose the issue.

Include application version, environment, route, timestamp, status code, correlation ID, browser version, and minimal reproduction steps. Remove secrets and personal data.
