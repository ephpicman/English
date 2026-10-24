# Release notes — 2.0.0

*Illustrative major-version notes. Confirm compatibility impact and migration steps before publication.*

## Version, release date, and summary

**Version:** 2.0.0  
**Release date:** 21 May 2026

This illustrative major release changes the configuration format and standardises error responses. Users should review the migration instructions before upgrading.

## Highlights

Configuration validation now reports missing required settings before startup. Error responses use a documented structure intended to help clients distinguish error types.

## New features and improvements

- Added explicit sections to the configuration format.
- Added early validation for required settings.
- Documented machine-readable error codes and human-readable messages.

## Bug fixes and security changes

- Fixed validation that previously accepted an invalid empty setting.
- Corrected the setup guide to match the supported installation command.
- Confirm security implications with the relevant owner before publication.

## Breaking changes / migration steps

The legacy configuration format is removed in this illustrative release. Convert existing settings to the new format, validate them in a test environment, and back up configuration before upgrading.

## Known issues and support

Check the current migration guide and verified issue list. Report the version, configuration shape with secrets removed, and a minimal reproduction.
