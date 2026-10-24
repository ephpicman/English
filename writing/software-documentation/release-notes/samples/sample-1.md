# Release notes — 2.4.0

*Illustrative release notes. Verify the version, date, merged changes, and security review before publication.*

## Version, release date, and summary

**Version:** 2.4.0  
**Release date:** 18 October 2026

This release adds status filtering to the ticket list and improves error messages for request tracing. Confirm the version and release date against the approved tag before publication.

## Highlights

Ticket list filtering is now available in the illustrative API contract. Error responses include a request identifier that support staff can use to trace a failure when the logging system is configured to record it.

## New features and improvements

- Added an optional `status` filter to ticket listing.
- Added a request ID to supported error responses.
- Updated setup documentation to distinguish required and optional settings.

## Bug fixes and security changes

- Fixed handling of an empty search query.
- Corrected a response-field name in an example. No security fix is asserted; verify the approved security review before claiming one.

## Breaking changes / migration steps

No breaking change is intended in this illustrative release. Clients should still verify response parsing and review the status-filter values supported by their deployed version.

## Known issues and support

The request ID is useful only if it is propagated to the relevant logs. If a request cannot be traced, include the time, request ID if present, and a redacted description when contacting support.
