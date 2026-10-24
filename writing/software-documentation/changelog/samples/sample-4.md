# Changelog — 0.9.2

*Illustrative release entry. Version, date, and changes must be checked against the actual release before publication.*

## Version and date

- **Version:** 0.9.2
- **Date:** 2026-05-14

## Added

- Added a retry option for transient connection failures, disabled by default.

## Changed

- Updated the troubleshooting section to explain how to distinguish authentication failures from network timeouts.

## Fixed

- Fixed a retry loop that could continue after the configured attempt limit.
- Fixed a message that incorrectly suggested credentials were invalid for every connection error.

## Deprecated and removed

- No deprecations or removals in this illustrative release.

## Security

- Retry behaviour should be reviewed for the target service to avoid excessive request volume. No security certification is implied.

## Final quality check

Confirm every item against merged changes and approved release notes. Use user-facing language, distinguish breaking changes from fixes, and do not imply a security review or guarantee unless it has been completed.
