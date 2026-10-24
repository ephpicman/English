# Changelog — 3.0.0

*Illustrative release entry. Version, date, and changes must be checked against the actual release before publication.*

## Version and date

- **Version:** 3.0.0
- **Date:** 2026-04-29

## Added

- Added a new configuration command that prints the resolved non-secret settings used by the application.

## Changed

- Changed the default configuration file location to the user-specific application directory.
- Updated the command output to use stable field names for scripting.

## Fixed

- Fixed inconsistent exit codes for invalid command-line arguments.

## Deprecated and removed

- The legacy `--config-path` alias is removed in this illustrative major release. Use `--config` instead.
- Scripts relying on the previous default path must be updated.

## Security

- The diagnostic command omits values marked as secrets, but users should review the output before sharing it.

## Final quality check

Confirm every item against merged changes and approved release notes. Use user-facing language, distinguish breaking changes from fixes, and do not imply a security review or guarantee unless it has been completed.
