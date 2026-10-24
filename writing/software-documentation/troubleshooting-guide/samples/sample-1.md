# Troubleshooting: unable to sign in

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide when a user cannot sign in to the application. You need the application name, approximate time of failure, and access to the approved account-recovery route. Never ask the user to send a password or authentication code.

## Symptoms and error identifiers

- The sign-in page returns an error after credentials are submitted.
- The user is returned to the sign-in page.
- A session-expired message appears immediately.

Record the exact error text and request identifier if one is shown. Do not record the password.

## Quick checks

1. Confirm the user is accessing the correct sign-in page.
2. Check whether the service has a known outage.
3. Ask the user to verify the keyboard layout and account identifier.
4. Use the approved password-reset route if the user may have forgotten the password.

## Diagnostic decision steps

If the page does not load, check service availability and network access. If the page loads but rejects the account, follow the approved recovery process. If sign-in succeeds and then returns to the login page, capture the timestamp and safe diagnostic identifier for the support team.

## Cause-specific fixes

- **Expired password:** use the approved reset flow.
- **Locked account:** follow the documented account-unlock process; do not bypass lockout controls.
- **Repeated redirect:** clear site data only if permitted by support guidance, then retry.
- **Possible service outage:** stop repeated attempts and escalate with the error details.

## Verification and prevention

After recovery, confirm the user can reach the expected landing page and that no unexpected account changes occurred. Recommend a password manager or approved authentication method where policy permits.

## Escalation details to collect

Provide application version if available, time and time zone, exact error, request ID, browser, and steps already tried. Exclude passwords, authentication codes, and sensitive account data.
