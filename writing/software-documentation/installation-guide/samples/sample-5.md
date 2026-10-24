# Installation guide: local database migration tool

*Illustrative guide. Verify migration commands, backup policy, and database support before running against real data.*

## Purpose and supported environment

This guide outlines a safe setup process for a database migration utility. It does not authorise a production migration; use the organisation’s approved change procedure for shared environments.

## Prerequisites

Confirm the supported runtime, database engine, and migration-tool version. Obtain an authorised development database and credentials with only the permissions needed for the test. Do not use production credentials for local practice.

## Preparation and configuration

Read the migration documentation and inspect the planned scripts. Back up any non-disposable database before applying changes. Record the current schema version and ensure the rollback or recovery plan is understood.

## Installation steps

Install the tool using the repository’s verified package instructions. Configure the development connection through the approved local secret mechanism. Run the tool’s help command to confirm that the expected version is available.

## Verification

Use a disposable database to test the migration. Confirm that the schema reaches the expected version and that the application’s basic read and write operations still work. Review logs for warnings and check that the migration history is recorded correctly.

## Common installation issues

Connection failures may result from a wrong host, unavailable database, or insufficient permissions. A migration checksum error may indicate that a previously applied script was edited; do not bypass the check without understanding the tool’s rules.

## Uninstall / rollback if applicable

Follow the tool’s documented rollback procedure only if the migration supports it and the consequences are understood. For destructive changes, recovery may require restoring a backup rather than running a reverse script.
