# Troubleshoot a failed upload

*Illustrative documentation example. Verify versions, commands, behaviour, and records before publication.*

## Scope and prerequisites

Before starting, confirm the supported version, required permissions, network access, and any dependencies listed by the project. Use a test environment first and keep credentials in an approved secret store rather than in source files or screenshots.

## Symptoms and error identifiers

**Symptom:** the task does not complete as expected. **Check:** confirm the environment and permissions, reproduce the issue with a minimal example, and inspect the relevant logs without exposing secrets. **Resolution:** apply the documented fix for the confirmed cause, repeat the test, and record the result. If the cause remains uncertain, collect diagnostic details and escalate rather than guessing.

## Quick checks

Keep the instructions specific, ordered, and testable. State what the reader needs, what action to take, what result to expect, and how to recover from common failure. Confirm all commands, versions, configuration keys, and system behaviour against the actual implementation.

## Diagnostic decision steps

1. Confirm the target environment and the required version.
2. Apply the configuration documented for that version.
3. Run the smallest safe test that exercises the intended task.
4. Check the expected result and review logs for errors.
5. Record any environment-specific changes so the process can be repeated. Verify each command against the real project before publishing.

## Cause-specific fixes

**Symptom:** the task does not complete as expected. **Check:** confirm the environment and permissions, reproduce the issue with a minimal example, and inspect the relevant logs without exposing secrets. **Resolution:** apply the documented fix for the confirmed cause, repeat the test, and record the result. If the cause remains uncertain, collect diagnostic details and escalate rather than guessing.

## Verification and prevention

Verify completion using a repeatable check and record the result. If the expected outcome is not observed, stop and follow the recovery path rather than continuing blindly. Update the document when the verified procedure or supported behaviour changes.

## Escalation details to collect

Keep the instructions specific, ordered, and testable. State what the reader needs, what action to take, what result to expect, and how to recover from common failure. Confirm all commands, versions, configuration keys, and system behaviour against the actual implementation.
