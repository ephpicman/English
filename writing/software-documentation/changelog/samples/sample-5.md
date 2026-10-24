# Changelog — 2.0.0

*Illustrative major-version changelog. Confirm the compatibility impact and migration instructions before release.*

## Before drafting

A major-version entry should make breaking changes clear and provide a route for users to adapt.

## Document structure

List added features, changed behaviour, fixes, removals, and security notes with emphasis on migration impact.

## Version and date

- **Version:** 2.0.0
- **Date:** 2026-05-21
- **Release status:** Illustrative

## Added

- Added a new configuration file format with explicit section names.
- Added validation that reports missing required settings before startup.

## Changed

- Configuration keys now use a consistent naming convention.
- Error responses use a documented structure for machine-readable codes and human-readable messages.

## Fixed

- Fixed validation that previously accepted an invalid empty setting.
- Corrected the setup guide to match the supported installation command.

## Deprecated and removed

- Removed the legacy configuration format in this illustrative major release. Users must migrate settings to the new format before upgrading.

## Security

- Confirm any security implications of configuration validation with the security owner before publication.

## Final quality check

Include a migration guide, verify upgrade behaviour, and ensure the changelog matches the release tag.
