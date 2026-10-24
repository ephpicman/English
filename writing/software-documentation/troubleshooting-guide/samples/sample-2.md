# Troubleshooting: file upload fails

*Illustrative troubleshooting guide. Verify the service’s actual file limits and accepted types.*

## Scope and prerequisites

Use this guide when a document upload fails in the application. Record the error, file size, file type, and approximate time. Do not ask users to email sensitive documents as a workaround.

## Symptoms and error identifiers

- The upload is rejected immediately.
- The progress indicator stops before completion.
- The interface reports that processing failed.
- The file appears uploaded but remains unavailable.

Capture the request ID or error code if shown.

## Quick checks

1. Confirm the file type is supported.
2. Check the documented size limit.
3. Confirm the user has permission to upload to the selected workspace.
4. Retry only after checking whether the first upload completed.

## Diagnostic decision steps

If the service rejects the file immediately, compare its type and size with the documented limits. If the upload stops mid-transfer, check network stability and service status. If the file uploads but remains pending, review the processing or scanning status rather than submitting duplicates.

## Cause-specific fixes

- **Unsupported type:** convert the file only if an approved format is available.
- **File too large:** use the approved compression method or split the content if policy allows.
- **Permission error:** verify workspace access through the normal account process.
- **Pending scan:** wait for the documented processing period or escalate if it exceeds the service target.

## Verification and prevention

Confirm the final status and make sure the file is visible only to authorised users. Avoid repeated retries if the outcome of the first attempt is unknown.

## Escalation details to collect

Provide file type, approximate size, time, error text, request ID, and steps attempted. Do not include the document contents unless an approved secure process requires them.
