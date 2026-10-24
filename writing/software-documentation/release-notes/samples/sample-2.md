# Release notes — 1.8.1

*Illustrative release notes. Verify the version, date, merged changes, and security review before publication.*

## Version, release date, and summary

**Version:** 1.8.1  
**Release date:** 2 November 2026

A maintenance release focused on startup reliability and clearer configuration diagnostics. This sample is illustrative and should be matched to the actual release artefacts.

## Highlights

The main improvement is clearer feedback when optional configuration is absent. The release does not introduce a new workflow or change the intended configuration format.

## New features and improvements

No new user-facing features are described for this patch release.

## Bug fixes and security changes

- Fixed startup behaviour when an optional environment variable is unset.
- Improved the error message shown when a required configuration value is missing.
- Corrected the documented path for the local configuration file.

## Breaking changes / migration steps

No breaking change is intended. Confirm compatibility with the supported runtime and configuration format before deploying.

## Known issues and support

If startup still fails, compare the local configuration with the current example file and remove secrets before sharing diagnostic output.
