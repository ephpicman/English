# Installation guide: Database migration tool

*Illustrative guide. Confirm project-specific commands, versions, and configuration before publishing or following these steps on a real system.*

## Purpose and supported environment

This guide outlines a cautious installation and verification flow for a database migration CLI. Replace the generic commands with the tool’s actual documented interface before use.

## Prerequisites

Access to a non-production database, a supported runtime, and the project’s migration configuration. Confirm backup and restore procedures before testing changes to a database.

## Preparation and configuration

Install the tool using the project’s trusted package source. Create a development configuration that points only to a test database. Check that credentials have the minimum permissions required for the intended migration.

## Installation steps

1. Install the version pinned by the project.
2. Set the development connection string through a local secret mechanism, not a committed file.
3. Run the tool’s documented status or dry-run command if available.
4. Apply migrations to a disposable test database using the exact command documented by the tool.

## Verification

Check the migration history table and verify the expected schema change against a known test. Run application tests that exercise the changed schema. Confirm that a rollback procedure exists where the migration is not inherently reversible.

## Common installation issues

Connection errors may come from network access, incorrect database names, or credentials. A migration failure may leave partial state; inspect the tool output and database before rerunning. Never test an uncertain recovery command against production.

## Uninstall / rollback if applicable

Use the documented rollback or restore procedure against the test database and verify the resulting schema. For production, follow the approved change process and backup plan rather than improvising a reverse migration.
