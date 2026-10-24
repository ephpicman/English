# Validating CSV files before data ingestion

*Illustrative technical article. Verify encoding, schema, and validation rules against the actual data pipeline.*

## Summary

CSV files look simple, but inconsistent headers, encodings, delimiters, missing values, and duplicate identifiers can cause downstream failures or misleading analysis. A validation stage should detect predictable problems before ingestion, report them clearly, and preserve the original file. Validation does not prove that every value is correct; it checks whether the input meets defined structural and domain rules. The examples here are illustrative and should be adapted to the data contract.

## Scope and Prerequisites

The intended reader builds or maintains a data-ingestion workflow. The input is a delimited text file with a documented schema. Before validation, confirm the expected encoding, delimiter, header names, field types, required columns, and meaning of missing values. If the producer’s format is undocumented, establish a contract before writing strict checks.

## Core Concepts

Structural validation checks whether the file can be parsed and contains the expected columns. Type validation checks whether values can be interpreted as dates, numbers, or identifiers in the required format. Domain validation checks rules that depend on the business meaning of the data, such as an allowed status value or a non-negative quantity. These categories should be reported separately because they require different fixes.

Missing values need careful treatment. An empty field may mean unknown, not applicable, or not yet supplied. Replacing every blank with zero can change the meaning of the data. Likewise, duplicate rows are not always errors: a repeated event may be valid, while a duplicate unique identifier may violate the data contract.

## Architecture or Workflow

The pipeline should preserve the source file, parse it with an explicit configuration, validate the schema, run field-level checks, and produce a report. Only data that passes the required checks should proceed to the next stage. If the pipeline supports quarantine, invalid rows can be separated with reasons while preserving a reference to the source file.

Validation rules should be versioned with the data contract. When a producer changes a column name or allowed value, the team should update the contract deliberately rather than silently adapting the parser to any incoming shape. A validation failure should include the row number or safe record reference, field, rule, and reason without exposing sensitive values unnecessarily.

## Implementation Details

A practical validation sequence is:

1. Check that the file exists and is within the configured size limit.
2. Decode using the expected encoding and report invalid byte sequences.
3. Parse using the agreed delimiter, quoting, and escape rules.
4. Confirm required headers and detect unexpected or duplicated column names.
5. Validate required fields, types, allowed values, and unique identifiers.
6. Summarise failures and stop or quarantine records according to the pipeline policy.

Avoid guessing the delimiter or encoding silently in a production pipeline. Heuristics can be useful for interactive tools, but ingestion should have a documented rule and a clear failure mode. Keep validation deterministic so that the same input and schema produce the same result.

## Limitations and Operational Concerns

A file can pass structural checks while still containing incorrect business information. Validation also depends on a trustworthy schema; an outdated schema can reject valid changes or accept bad data. Large files may require streaming to control memory usage. Error reports should be bounded and access-controlled if records contain personal or confidential information.

Track validation failures by rule and source, not just the total number of rejected files. This helps identify whether the problem comes from a producer change, a data-entry issue, or an overly strict rule.

## Conclusion

Reliable ingestion begins with an explicit data contract and a validation stage that explains failures. Preserve source data, separate structural from domain checks, and treat schema changes as reviewed changes rather than assumptions. This makes pipeline behaviour more predictable and errors easier to resolve.
