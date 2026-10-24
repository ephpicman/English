# Release notes — 2.4.0

*Illustrative release notes. Verify version, date, merged changes, and security review before publication.*

## Version, release date, and summary

**Version:** 2.4.0  
**Release date:** 20 October 2026

This illustrative release adds status filtering to a list endpoint and improves error messages for request tracing. Confirm the version and date against the approved release tag before publication.

## Highlights

Users can narrow the list by status, and support staff can use a request identifier to trace a failed operation when the logging system records it.

## New features and improvements

- Added an optional status filter to the list endpoint.
- Added a request identifier to supported error responses.
- Updated setup documentation to distinguish required and optional settings.

## Bug fixes and security changes

- Fixed inconsistent handling of an empty search query.
- Corrected an example that used an outdated response field name.
- No security improvement is claimed without confirmation from the reviewed release record.

## Breaking changes / migration steps

No breaking change is specified in this illustrative release. Confirm client compatibility and include migration steps if the actual release changes a contract or configuration.

## Known issues and support

Check the project’s issue tracker for verified known issues. Report problems with the version number, relevant logs, and a minimal reproduction that contains no secrets or personal data.
