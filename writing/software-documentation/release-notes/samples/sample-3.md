# Release notes — 3.0.0

*Illustrative release notes. Verify the version, date, merged changes, and security review before publication.*

## Version, release date, and summary

**Version:** 3.0.0  
**Release date:** 12 December 2026

This major release changes the default configuration path and removes a legacy command-line alias. Users who rely on scripts or existing configuration locations must review the migration steps before upgrading.

## Highlights

Configuration handling is more explicit, and diagnostic output uses stable field names. The default path change is intended to make per-user configuration easier to manage.

## New features and improvements

- Added a command to display resolved non-secret configuration values.
- Standardised names in diagnostic output.

## Bug fixes and security changes

- Normalised exit codes for invalid command-line arguments.

## Breaking changes / migration steps

The legacy `--config-path` alias is removed in this illustrative release; use `--config` instead. Scripts that depend on the previous default path must be updated and tested. Back up the existing configuration before upgrading.

## Known issues and support

The diagnostic command intentionally omits values marked as secrets, but review output before sharing it. Confirm actual secret-redaction behaviour in the released build.
