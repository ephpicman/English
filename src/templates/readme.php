<?php
$totalEntries = (int) ($entry['total_entries'] ?? 0);
$validEntries = (int) ($entry['valid_entries'] ?? 0);
$invalidEntries = (int) ($entry['invalid_entries'] ?? 0);
$entriesByType = is_array($entry['entries_by_type'] ?? null)
    ? $entry['entries_by_type']
    : [];
$invalidEntryPaths = is_array($entry['invalid_entry_paths'] ?? null)
    ? $entry['invalid_entry_paths']
    : [];
$invalidBadgeColour = $invalidEntries === 0 ? 'brightgreen' : 'red';
?>
# English

![Total entries](https://img.shields.io/badge/Total%20entries-<?= $totalEntries ?>-blue)
![Valid entries](https://img.shields.io/badge/Valid%20entries-<?= $validEntries ?>-brightgreen)
![Invalid entries](https://img.shields.io/badge/Invalid%20entries-<?= $invalidEntries ?>-<?= $invalidBadgeColour ?>)

<?php foreach ($entriesByType as $type => $count): ?>
![<?= str_replace('_', ' ', ucfirst((string) $type)) ?> entries](https://img.shields.io/badge/<?= rawurlencode(str_replace('_', ' ', ucfirst((string) $type))) ?>-<?= (int) $count ?>-informational)
<?php endforeach; ?>

A structured collection of English-learning materials, organised by content type and maintained as validated PHP entries.

## Repository overview

Learning content is stored as PHP arrays in `db/<type>/`, using the corresponding schema in `db/schema/`. The discovery process validates each entry, generates Markdown versions of valid entries, and maintains machine-readable registries and statistics.

## Content types

| Type | Description |
|---|---|
<?php foreach ($entriesByType as $type => $count): ?>
| `<?= $type ?>` | <?= ucfirst(str_replace('_', ' ', (string) $type)) ?> entries; currently <?= (int) $count ?>. |
<?php endforeach; ?>

## Repository structure

- `db/schema/` — authoritative schemas for each supported entry type.
- `db/<type>/` — source PHP entries, organised by type.
- `src/templates/` — PHP templates used to render entries as Markdown, plus this README template.
- `src/lib.php` — shared validation and rendering functions.
- `src/discover.php` — discovers schemas and entries, validates entries, generates Markdown and registries, calculates statistics, and renders this README.
- `dist/<type>/` — generated Markdown files for valid entries.
- `build/` — generated PHP registries for schemas, entries, and Markdown files.
- `statistics.json` — generated entry statistics, including invalid-entry paths.
- `README.md` — generated project overview and live repository statistics.

## Entry statistics

The badges above are generated from `statistics.json` each time discovery runs. The statistics include the total number of entry files, counts by type, valid and invalid totals, and the repository-relative paths of invalid entries.

<?php if ($invalidEntryPaths !== []): ?>
### Invalid entries

The following entries need attention:

<?php foreach ($invalidEntryPaths as $path): ?>
- [`<?= $path ?>`](<?= rawurlencode($path) ?>)
<?php endforeach; ?>
<?php else: ?>
There are currently no invalid entries.
<?php endif; ?>

## Adding or editing content

1. Read the relevant schema in `db/schema/`.
2. Follow the instructions in [`CONTRIBUTING.md`](CONTRIBUTING.md), including its identifier, structure, and validation requirements.
3. Save entries under `db/<type>/<ID>.php`.
4. Push changes to `main`. GitHub Actions runs discovery and commits updated generated files when necessary.

Do not edit generated files such as `dist/`, `build/`, `statistics.json`, or this README manually; update the source files and let discovery regenerate them.

## Validation and automation

The discovery workflow checks PHP syntax, validates entries against their schemas, generates Markdown for valid entries, updates the registries and statistics, and validates the generated JSON before committing changed outputs.

## Licence

Unless otherwise stated, this repository's original learning materials are licensed under the [Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International Licence (CC BY-NC-ND 4.0)](LICENSE).
