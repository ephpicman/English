# English

![Total entries](https://img.shields.io/badge/Total%20entries-1-blue)
![Valid entries](https://img.shields.io/badge/Valid%20entries-1-brightgreen)
![Invalid entries](https://img.shields.io/badge/Invalid%20entries-0-brightgreen)

![Collocation entries](https://img.shields.io/badge/Collocation-0-informational)
![Conversation entries](https://img.shields.io/badge/Conversation-0-informational)
![Essay entries](https://img.shields.io/badge/Essay-0-informational)
![Grammar entries](https://img.shields.io/badge/Grammar-0-informational)
![Idiom entries](https://img.shields.io/badge/Idiom-0-informational)
![Letter entries](https://img.shields.io/badge/Letter-0-informational)
![Monologue entries](https://img.shields.io/badge/Monologue-0-informational)
![Phrasal verb entries](https://img.shields.io/badge/Phrasal%20verb-0-informational)
![Proverb entries](https://img.shields.io/badge/Proverb-0-informational)
![Reading entries](https://img.shields.io/badge/Reading-0-informational)
![Word entries](https://img.shields.io/badge/Word-1-informational)

## Validation status

All discovered entries currently pass validation. If invalid entries appear here in future, please treat correcting them as a priority and follow the [Contributor Guidelines](CONTRIBUTING.md).

A structured collection of English-learning materials, organised by content type and maintained as validated PHP entries.

## Repository overview

Learning content is stored as PHP arrays in `db/<type>/`, using the corresponding schema in `db/schema/`. The discovery process validates each entry, generates Markdown versions of valid entries, and maintains machine-readable registries and statistics.

## Content types

| Type | Description |
|---|---|
| `collocation` | Collocation entries; currently 0. |
| `conversation` | Conversation entries; currently 0. |
| `essay` | Essay entries; currently 0. |
| `grammar` | Grammar entries; currently 0. |
| `idiom` | Idiom entries; currently 0. |
| `letter` | Letter entries; currently 0. |
| `monologue` | Monologue entries; currently 0. |
| `phrasal_verb` | Phrasal verb entries; currently 0. |
| `proverb` | Proverb entries; currently 0. |
| `reading` | Reading entries; currently 0. |
| `word` | Word entries; currently 1. |

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

Invalid-entry paths are listed near the top of this README whenever validation failures are present. These files should be corrected before routine content improvements.


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
