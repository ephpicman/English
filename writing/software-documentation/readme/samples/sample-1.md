# csv-audit

A small command-line utility for checking CSV files before they enter a data pipeline.

## Project name and one-line purpose

**csv-audit** — A small command-line utility for checking CSV files before they enter a data pipeline.

## Overview and intended audience

This illustrative Python project helps analysts inspect a CSV file for missing required columns, blank values, and duplicate rows. It is intended for local validation, not as a replacement for domain-specific data-quality rules.

## Key features

- Reports whether required columns are present.
- Counts blank values in selected columns.
- Reports exact duplicate rows.
- Exits with a non-zero status when configured checks fail.

## Prerequisites

Python 3.11 or a compatible version supported by the project; a terminal; and a UTF-8 CSV file. Confirm the actual package metadata before publishing a real repository README.

## Quick start

Create and activate a virtual environment, install the project’s declared dependencies, then run the command against a test file. For an installed CLI named `csv-audit`, an illustrative invocation is `csv-audit data.csv --required id,email`. The command name and flags must match the actual implementation.

## Configuration / usage

Use a version-controlled configuration file for project-specific required fields. Do not place secrets in the file. Run the tool on a small sample first and review the report before adding it to an automated pipeline.

## Contribution, support, and licence

Contributions should include a focused change, tests for valid and invalid CSV input, and an update to user-facing documentation when behaviour changes. Choose a licence only after confirming the repository owner’s intended terms. Report bugs with a minimal sample that contains no sensitive data.
