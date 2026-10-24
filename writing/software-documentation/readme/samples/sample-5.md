# url-checker

A command-line tool for checking links in a set of local Markdown documents.

## Project name and one-line purpose

**url-checker** scans Markdown files and reports links that may need review.

## Overview and intended audience

This illustrative tool is intended for documentation maintainers who want to catch malformed links and identify URLs that fail a configured check. Network results can change, and a failed request does not always mean that a link is permanently broken.

## Key features

- Scans Markdown files in a selected directory.
- Extracts common inline links.
- Reports malformed or missing destinations.
- Can produce a machine-readable summary if supported by the implementation.
- Leaves source documents unchanged.

## Prerequisites

Check the repository metadata for the supported runtime and dependencies. Network checks require connectivity and must respect the target sites’ access rules and rate limits.

## Quick start

Install the tool from its documented release or source instructions and inspect its help:

```bash
url-checker --help
```

Start with a small documentation folder to understand how the tool handles redirects and timeouts.

## Configuration / usage

A representative command might be:

```bash
url-checker ./docs
```

Confirm supported options, status handling, and output formats in the actual version. Review flagged links manually before deleting or changing them.

## Contribution, support, and licence

Contributions should test relative links, redirects, timeouts, and non-HTTP destinations where relevant. Bug reports should include a minimal document and tool version. Add the actual licence and support links before publication.
