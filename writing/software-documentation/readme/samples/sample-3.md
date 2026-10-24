# image-metadata-checker

A review tool for listing basic metadata from image files.

## Project name and one-line purpose

**image-metadata-checker** — A review tool for listing basic metadata from image files.

## Overview and intended audience

This illustrative project helps a user inspect image dimensions, file type, and selected metadata before publishing a batch of images. It is designed as a review aid; it does not determine whether an image is legally safe to publish.

## Key features

- Lists supported file types and image dimensions.
- Flags files with missing or unexpected metadata.
- Writes a review report without modifying originals by default.
- Separates inspection from any optional metadata removal.

## Prerequisites

A supported Python runtime and the imaging library specified in the project dependency file. Use test images first and avoid uploading private images to an untrusted service.

## Quick start

Install dependencies in an isolated environment, then run the checker against a directory of test images. Review the report and confirm that the file list and metadata fields match the intended scope before using it on production assets.

## Configuration / usage

Configure accepted file extensions and the metadata fields relevant to the workflow. Treat filenames and metadata as potentially sensitive; redact paths from reports before sharing them externally.

## Contribution, support, and licence

Include tests for corrupt files, unsupported formats, and images with missing metadata. A change that deletes or rewrites metadata should be explicit, reversible where possible, and documented separately from read-only inspection.
