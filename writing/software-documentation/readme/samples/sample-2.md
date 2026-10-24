# image-indexer

A local utility for creating a searchable index of image files in a directory.

## Project name and one-line purpose

**image-indexer** records file paths and basic image metadata so a collection can be searched without opening every file manually.

## Overview and intended audience

This illustrative tool is intended for photographers, archivists, or developers managing a local image collection. It indexes metadata available from files; it does not identify people, determine image rights, or replace a backup system.

## Key features

- Scans supported image extensions in a chosen directory.
- Records file name, relative path, size, and modification time.
- Skips unreadable files and reports them in a summary.
- Writes the index to a user-selected output location.
- Supports a dry-run mode if implemented in the actual CLI.

## Prerequisites

Check the project metadata for the supported runtime and image libraries. The input directory must be readable, and the output location must have enough space for the index.

## Quick start

After installing from the project’s official source, inspect the command help:

```bash
image-indexer --help
```

Start with a small test folder before indexing a large archive.

## Configuration / usage

A typical usage pattern might be:

```bash
image-indexer ./photos --output ./index.json
```

Confirm the supported output formats and flags in the installed version. Keep the output outside the scanned directory to avoid indexing the index file repeatedly.

## Contribution, support, and licence

Bug reports should include the operating system, tool version, and a minimal example using non-sensitive files. Contributions should include tests for supported formats and unreadable-file handling. Insert the actual licence and issue-tracker link before publication.
