# csv-audit

A small command-line utility for checking CSV files before they enter a data pipeline.

## Project name and one-line purpose

**csv-audit** checks selected structural issues in a CSV file and produces a concise validation report.

## Overview and intended audience

This illustrative Python project is intended for analysts and developers who need a repeatable first-pass check before importing tabular data. It does not replace domain-specific validation or guarantee that every value is correct.

## Key features

- Checks for required column names.
- Reports blank values in configured columns.
- Identifies exact duplicate rows.
- Returns a non-zero exit status when a configured check fails.
- Keeps the original input file unchanged.

## Prerequisites

Use a supported Python version specified in the project metadata, a terminal, and a CSV file encoded in UTF-8. Confirm the actual supported version and dependency list before publishing this README.

## Quick start

Install the package using the method documented by the repository. For a local source checkout, a typical development workflow is:

```bash
python -m venv .venv
source .venv/bin/activate
python -m pip install -e .
csv-audit --help
```

On Windows, activate the virtual environment using the appropriate shell command.

## Configuration / usage

A representative command might be:

```bash
csv-audit data/input.csv --required-columns id,email,created_at
```

Check the actual CLI help for supported options. Review the report and resolve errors in a working copy of the data; the tool should not be assumed to repair source files automatically.

## Contribution, support, and licence

Report reproducible issues with a small synthetic CSV that contains no personal data. Contributions should include tests for new validation rules and documentation updates. Add the repository’s actual licence and support contact before publication.
