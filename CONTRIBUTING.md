# Contributor Guidelines

Thank you for contributing to this repository. These guidelines define how to add new learning content consistently and how to avoid duplicate entries.

## 1. Choose an Existing Schema

Every new entry **must use one of the schemas already provided in [`db/schema/`](db/schema/)**. Do not invent a new entry type or create a record using a different structure.

Read the selected PHP schema from beginning to end before writing the entry. It documents the expected fields, required values, data types, nested structures, and content-specific rules. Treat those instructions as authoritative.

| Type | Schema | Use it for |
|---|---|---|
| `word` | [`db/schema/word.php`](db/schema/word.php) | A single vocabulary headword, with its grammatical forms, parts of speech, meanings, and usage information. Do not use it for idioms, phrasal verbs, or collocations. |
| `idiom` | [`db/schema/idiom.php`](db/schema/idiom.php) | A conventional expression whose meaning is not always predictable from its individual words. |
| `collocation` | [`db/schema/collocation.php`](db/schema/collocation.php) | A conventional or strongly preferred combination of words, including its grammatical pattern and meanings. |
| `phrasal_verb` | [`db/schema/phrasal_verb.php`](db/schema/phrasal_verb.php) | A verb combined with one or more particles, including its grammatical behaviour and distinct meanings. |
| `proverb` | [`db/schema/proverb.php`](db/schema/proverb.php) | An established saying that expresses a general truth, piece of advice, or customary observation. Do not use it for an ordinary sentence, slogan, quotation, or idiom unless it genuinely functions as a proverb. |
| `grammar` | [`db/schema/grammar.php`](db/schema/grammar.php) | A grammar point, rule, construction, or usage distinction explained according to the grammar schema. |
| `reading` | [`db/schema/reading.php`](db/schema/reading.php) | A reading passage intended for learners, with the descriptive and educational information required by its schema. |
| `essay` | [`db/schema/essay.php`](db/schema/essay.php) | A complete essay, with its title, essay type, register, and educational notes. |
| `letter` | [`db/schema/letter.php`](db/schema/letter.php) | A complete letter, including the appropriate opening, body, and sign-off, with its type and communicative purpose. |
| `conversation` | [`db/schema/conversation.php`](db/schema/conversation.php) | A dialogue with defined participants and turns in speaking order. |
| `monologue` | [`db/schema/monologue.php`](db/schema/monologue.php) | A complete spoken text designed to sound natural when delivered aloud. |

If no existing schema accurately represents the proposed entry, do not force it into an unsuitable type. Raise the issue for review before adding content.

## 2. Follow the Selected Schema Exactly

Each schema is the specification for its entry type. Contributors must:

- Include every required field and preserve the schema's field names and nesting.
- Preserve the intended data type and structure of each field. For example, do not replace a list with a paragraph or a nested record with an unrelated field.
- Follow the instructions and constraints documented beside each field.
- Keep the value of `type` exactly equal to the selected schema type.
- Use UTF-8 and British English throughout learner-facing content.
- Use accurate, natural language appropriate to the entry's purpose and stated CEFR level.
- Keep editorial metadata separate from learner-facing material.
- Leave optional or inapplicable values in the form specified by the schema; do not delete required keys simply because a value is unavailable or irrelevant.
- Do not add, remove, rename, or repurpose fields. If the schema itself needs to change, propose that change separately rather than silently changing an individual entry.

### Representing schema fields in PHP

The individual entry must be a **PHP (`.php`) file**. Represent its fields and nested structures using the data structure and conventions defined by the selected PHP schema. Preserve the schema's complete information structure: every field must be represented, and lists, grouped records, examples, and relationships must remain distinguishable.

The PHP schema remains authoritative for field names, requiredness, data types, permitted values, and field-specific instructions. Markdown formatting does not permit contributors to omit or redefine schema fields. Do not copy PHP comments, placeholder text, or template instructions into the finished entry as if they were actual content.

## 3. Set the Identifier and Filename Correctly

Every entry must have a unique `ID`. The filename must be derived from that field exactly:

- Read the value of `ID` in the entry.
- Use that exact value as the filename, preserving its spelling and capitalisation.
- Append the `.md` extension.
- Do not substitute a title, a shortened form, a translation, or a different identifier for the `ID`.

For example, if the entry's ID is `look after` and its type is `phrasal_verb`, its path must be:

```text
db/phrasal_verb/look after.md
```

The example illustrates the naming rule; always follow the repository's actual ID value and directory conventions. Do not silently replace spaces or punctuation with alternative characters.

### Check for duplicates before creating a file

Before adding an entry, check the relevant `db/<type>/` directory and search the repository for the same ID.

- If an entry with that ID already exists, **do not create another file**.
- Do not overwrite or rename an existing entry to make room for a new one.
- If the existing entry needs improvement, propose an edit to that entry instead, following the repository's review process.
- If two genuinely different entries appear to need the same ID, stop and request clarification; do not invent a suffix to bypass the collision.

## 4. Save the File in the Required Location

Every entry must be saved at:

```text
db/<type>/<ID>.md
```

Replace `<type>` with the exact type defined by the selected schema and `<ID>` with the exact ID value, then append `.php`.

Examples:

| Entry type | ID | Required path |
|---|---|---|
| `word` | `reliable` | `db/word/reliable.php` |
| `idiom` | `spill the beans` | `db/idiom/spill the beans.php` |
| `grammar` | `present simple` | `db/grammar/present simple.php` |
| `conversation` | `at the railway station` | `db/conversation/at the railway station.php` |

These are naming examples, not claims that the example entries already exist.

Do not save an entry in the schema directory. The PHP files in `db/schema/` define the structures; individual Markdown records belong in the corresponding `db/<type>/` directory.

## 5. Review Before Submitting

Use this checklist before submitting a contribution:

- [ ] I selected an existing schema from `db/schema/`.
- [ ] I read and followed the selected schema's field-level instructions.
- [ ] The `ID` is present, stable, and unique.
- [ ] The filename matches the `ID` exactly, with `.md` appended.
- [ ] The file is saved at `db/<type>/<ID>.md`.
- [ ] I checked for an existing entry with the same ID and have not duplicated or overwritten it.
- [ ] Every schema field and nested structure is represented in the Markdown entry.
- [ ] The `type` value matches the selected schema exactly.
- [ ] The content is accurate, natural, consistently written in British English, and suitable for its intended learning level.
- [ ] I have kept editorial notes separate from learner-facing content and have not added unrequested exercises or questions.
- [ ] I have checked links and references to related entries, where applicable.

Contributions that do not follow the selected schema, identifier rule, or required directory structure may need to be revised before they can be accepted.
