# Installation guide: Static website deployment preview

*Illustrative guide. Confirm project-specific commands, versions, and configuration before publishing or following these steps on a real system.*

## Purpose and supported environment

This guide describes how to build and preview a static site locally before publishing it. Build commands vary by framework and must be confirmed in the project manifest.

## Prerequisites

Install the runtime and package manager supported by the site. Ensure the repository’s dependencies can be installed and identify the documented build and preview commands.

## Preparation and configuration

Review the site’s environment configuration and distinguish public build-time settings from secrets. Static assets may be visible to every visitor, so never embed private API keys or credentials in client-side code.

## Installation steps

1. Retrieve the source from the trusted repository.
2. Install dependencies using the package manager and lockfile.
3. Run the project’s documented build script, such as `npm run build` only if defined.
4. Serve the generated output using the framework’s preview command or a local static server.

## Verification

Open the preview URL and check key routes, links, images, and responsive layouts. Inspect the browser console and network requests. If the site uses client-side routing, test a direct refresh on a nested route.

## Common installation issues

A blank page may indicate an incorrect asset base path or a runtime error. Missing environment settings may affect build output. Check the framework’s deployment documentation before changing routing or public path configuration.

## Uninstall / rollback if applicable

Remove generated build output if it is safe to regenerate, and revert only the local configuration changes made for the preview. Do not publish the build until required environment settings and route behaviour have been checked.
