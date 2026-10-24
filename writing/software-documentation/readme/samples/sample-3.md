# meeting-notes-cli

A command-line tool for creating structured meeting notes from a local template.

## Project name and one-line purpose

**meeting-notes-cli** creates a consistent note file with meeting metadata, decisions, and action items.

## Overview and intended audience

This illustrative utility is for teams that want a lightweight way to start meeting records without adopting a separate collaboration platform. It creates a template; it does not automatically know what was discussed or determine who accepted an action.

## Key features

- Generates a note file with date, attendees, and purpose fields.
- Includes separate sections for decisions and action items.
- Allows a project or meeting name to be supplied at creation.
- Keeps generated files editable as plain text or Markdown.

## Prerequisites

Use the runtime version documented by the repository and a terminal with write access to the destination directory. Review the project’s privacy guidance before storing confidential meeting content.

## Quick start

Install from the repository’s documented release or development instructions, then inspect available options:

```bash
meeting-notes --help
```

## Configuration / usage

A representative command might be:

```bash
meeting-notes create "Quarterly planning" --output ./notes
```

The resulting file should be reviewed and completed by the meeting owner. Confirm the actual command name and flags before relying on this example.

## Contribution, support, and licence

Contributions should preserve the simple structure and include tests for generated headings and file paths. Do not attach real confidential notes to public bug reports. Add the real licence, support route, and contribution rules before release.
