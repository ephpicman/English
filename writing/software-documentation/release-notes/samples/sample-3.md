# Release notes — 3.1.0

*Illustrative release notes. Confirm the version, date, and changes against the actual release.*

## Version, release date, and summary

**Version:** 3.1.0  
**Release date:** 12 August 2026

This example release adds a read-only processing-status endpoint and a configurable output directory.

## Highlights

The new status endpoint allows authorised clients to check processing state without repeating the original request. The output-directory option makes local runs easier to organise.

## New features and improvements

- Added a documented read-only processing-status operation.
- Added an output-directory option to the command-line interface.
- Clarified the response returned while a request remains in progress.

## Bug fixes and security changes

- Improved the error message for missing required fields.
- Corrected a sample configuration that used an unsupported value.
- Verify any security-related changes with the reviewed security record before publication.

## Breaking changes / migration steps

No breaking change is stated in this example. Check the API compatibility report before finalising this section.

## Known issues and support

Confirm known issues from the release tracker. Include links only when the issue is public and safe to share.
