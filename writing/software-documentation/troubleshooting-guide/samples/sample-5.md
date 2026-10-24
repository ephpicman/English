# Troubleshooting: API returns HTTP 401

*Illustrative troubleshooting guide. Confirm the API’s authentication scheme and error contract.*

## Scope and prerequisites

Use this guide when an API request returns HTTP 401. You need the endpoint, time, request ID if available, and a safe description of how authentication is configured. Never request a user’s token or secret.

## Symptoms and error identifiers

- The response indicates missing or invalid authentication.
- A request that previously worked begins returning 401.
- A client sends a token but the service still rejects the request.

## Quick checks

1. Confirm the request includes the documented authentication header.
2. Check whether the token has expired.
3. Verify that the client is using the correct environment.
4. Confirm the server’s clock and token issuer settings only through approved diagnostics.

## Diagnostic decision steps

If no token is sent, correct the client configuration. If the token is expired, use the approved renewal flow. If the token is present and valid but rejected, check issuer, audience, signing-key rotation, and environment mismatch with the service owner. Do not disable validation as a workaround.

## Cause-specific fixes

- **Expired token:** obtain a new token through the documented flow.
- **Wrong environment:** use credentials issued for the target environment.
- **Configuration mismatch:** escalate to the identity or API owner with safe diagnostic details.
- **Possible key rotation issue:** follow the approved incident procedure.

## Verification and prevention

Retry with a newly issued token in a test environment and confirm that an unauthorised request remains rejected. Review credential rotation and expiry guidance.

## Escalation details to collect

Provide endpoint, time and time zone, status code, request ID, environment, and client version. Redact Authorization headers and all secrets.
