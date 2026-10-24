# Installation guide: Python command-line tool

*Illustrative guide. Confirm package name, supported versions, and commands against the actual project before publishing.*

## Purpose and supported environment

This guide describes a generic installation flow for a Python command-line tool distributed as a package. It assumes the project supports a current Python 3 release; check the project metadata for the exact minimum and supported operating systems.

## Prerequisites

Install the supported Python version and confirm it is available in the terminal. A virtual environment is recommended so dependencies do not interfere with other projects. Use a trusted package source or the repository’s documented installation method.

## Preparation and configuration

Review the project README and dependency metadata. Choose a working directory and decide whether the tool will be installed for development or used as a packaged command. Do not install from an unverified archive.

## Installation steps

Create and activate an isolated environment:

```bash
python -m venv .venv
source .venv/bin/activate
python -m pip install --upgrade pip
```

Install the package using the project’s verified package name or install from the checked-out source as documented. Do not substitute a guessed package name.

## Verification

Run the command’s help option and a documented version check. If the project provides tests, run the smoke test described in its README. Confirm the command is available only in the intended environment.

## Common installation issues

If the command is not found, confirm that the virtual environment is active. If installation fails, check the supported Python version and dependency requirements. Avoid resolving dependency conflicts by upgrading unrelated packages blindly.

## Uninstall / rollback if applicable

Deactivate the environment and remove the virtual environment directory if it is no longer needed. For a shared environment, use the package manager to uninstall the verified package name and follow the project’s cleanup guidance.
