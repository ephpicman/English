# Release notes — 0.9.2

*Illustrative release notes. Verify the version, date, merged changes, and security review before publication.*

## Version, release date, and summary

**Version:** 0.9.2  
**Release date:** 7 January 2027

This pre-release improves handling of temporary connection failures and updates troubleshooting guidance. It is not a statement about a real product release.

## Highlights

The release clarifies how the client reports connection timeouts and provides a bounded retry option for transient failures.

## New features and improvements

- Added a configurable retry option that is disabled by default.
- Added guidance for distinguishing connection timeouts from authentication errors.

## Bug fixes and security changes

- Fixed a retry loop that could exceed the configured attempt limit.
- Corrected a message that previously implied every connection error was caused by invalid credentials.

## Breaking changes / migration steps

No breaking change is intended in this illustrative release. Review retry defaults and configuration before enabling retries in a production environment.

## Known issues and support

Retries may increase load on a failing dependency. Use conservative limits and monitor error rates; no guarantee of recovery is implied.
