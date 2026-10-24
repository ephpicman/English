# Troubleshooting: unable to sign in

*Illustrative troubleshooting guide. Confirm system-specific messages and recovery procedures before use.*

## Scope and prerequisites

Use this guide when a user cannot sign in to the application. You need the application name, approximate time of failure, and access to the normal account recovery route. Do not ask the user to send a password or authentication code.

## Symptoms and error identifiers

- Sign-in page returns an error after credentials are submitted.
- The user is returned to the sign-in page.
- A session-expired message appears immediately.

## Quick checks

1. Check whether the service status page reports an incident.
2. Confirm the user is using the correct organisation sign-in page.
3. Check device time and network connectivity.
4. Ask whether the issue affects one application or several, without collecting secret values.

## Diagnostic decision steps

If the service is available, confirm the exact error text and time. If only one user is affected, use the approved account recovery process and check whether the account is locked. If several users are affected, check the identity provider status and recent configuration changes. Do not disable authentication controls as a workaround.

## Cause-specific fixes

For an expired password, use the official reset flow. For an account lock, follow the authorised unlock process. For a broad identity-provider outage, follow the incident communication process and wait for the service owner’s confirmation before retrying.

## Verification and prevention

After the fix, sign in through the normal route and open a permitted page. Confirm that access controls still work and that no shared credentials were introduced. Record the resolution category without including passwords or tokens.

## Escalation details to collect
If the issue is recurring, record whether it affects one account, one browser, or multiple users. This helps the service owner distinguish a local configuration problem from a wider incident. Close the support record only after the expected sign-in flow has been checked and any required follow-up is assigned.
Once the immediate issue is resolved, consider whether the same symptom may affect other users. If it began after a configuration change, record the change reference and ask the service owner to review the deployment history. Do not repeatedly reset accounts or disable controls as a workaround. A support record should state which check confirmed recovery and whether any follow-up is still required. If the user reports another failure, compare the new timestamp and error identifier with the earlier incident rather than assuming the cause is identical.

Provide application name, timestamp and time zone, exact error text, affected user scope, correlation ID if available, recent changes, and steps already tried. Redact email addresses or other identifiers if the support channel does not require them.
