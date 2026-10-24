# log-sampler

A small utility for selecting representative application log entries for local review.

## Project name and one-line purpose

**log-sampler** helps engineers inspect a bounded sample of log records without exporting an entire log archive.

## Overview and intended audience

This illustrative tool is intended for developers investigating recurring errors in a test or approved local dataset. It is not a log aggregation service, and it should not be used to bypass access controls or move restricted data into an unapproved environment.

## Key features

- Reads a supported local log format.
- Filters records by a configured severity or event field.
- Samples a bounded number of matching entries.
- Reports skipped or malformed lines.
- Can write a summary without including full message bodies, if configured.

## Prerequisites

Confirm the runtime and supported input formats in the project metadata. The user must have authorised access to the source logs and a destination approved for the output.

## Quick start

Install using the project’s documented method and check the available flags:

```bash
log-sampler --help
```

Use a small synthetic log file to test the configuration first.

## Configuration / usage

A representative command could be:

```bash
log-sampler ./sample.log --level warning --limit 50
```

Verify the exact options before use. Review output for tokens, email addresses, identifiers, and other sensitive fields before sharing it.

## Contribution, support, and licence

Include tests for malformed records, empty input, and sample limits. Public issue reports must use synthetic logs. Add the actual licence, support route, and data-handling policy before publishing.
