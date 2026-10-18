<?php

/**
 * Shared entry-loading, validation, and rendering utilities.
 *
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

/**
 * The entry types supported by the repository.
 *
 * Keeping this allowlist central prevents user-supplied type values from being
 * used to construct arbitrary filesystem paths.
 *
 * @return list<string>
 */
function supportedEntryTypes(): array
{
    return [
        'word',
        'idiom',
        'collocation',
        'phrasal_verb',
        'proverb',
        'grammar',
        'reading',
        'essay',
        'letter',
        'conversation',
        'monologue',
    ];
}

/**
 * Load an entry PHP file and return the array it returns.
 *
 * Entries are expected at db/<type>/<ID>.php and must return an array.
 * Unknown types, unsafe identifiers, missing files, and files that do not
 * return arrays are treated as not found and result in null.
 *
 * The type must be one of the repository's supported entry types. IDs may
 * contain ordinary punctuation and spaces, but path separators and traversal
 * identifiers are rejected.
 *
 * @param string $type Entry type, such as "word" or "reading".
 * @param string $ID   Exact entry identifier and filename, without ".php".
 *
 * @return array|null The loaded entry, or null if it cannot be loaded.
 */
function loadEntry($type, $ID): null|array
{
    if (!is_string($type) || !in_array($type, supportedEntryTypes(), true)) {
        return null;
    }

    if (
        !is_string($ID)
        || $ID === ''
        || $ID === '.'
        || $ID === '..'
        || str_contains($ID, '/')
        || str_contains($ID, '\\')
        || str_contains($ID, "\0")
    ) {
        return null;
    }

    $path = dirname(__DIR__) . '/db/' . $type . '/' . $ID . '.php';

    if (!is_file($path) || !is_readable($path)) {
        return null;
    }

    // Isolate the include scope so that an entry file cannot overwrite local
    // variables used by this function.
    $entry = (static function (string $file) {
        return require $file;
    })($path);

    return is_array($entry) ? $entry : null;
}

/**
 * Validate an entry against the structure and documented constraints of its
 * declared schema.
 *
 * The entry must declare a supported "type". Its schema file is loaded from
 * db/schema/<type>.php and used as the structural prototype: required keys,
 * nested record shapes, and scalar types are checked recursively. Unknown
 * keys are rejected so that entry data cannot silently drift away from the
 * authoritative schema.
 *
 * This function checks structural validity and selected controlled values. It
 * does not attempt to judge whether definitions, examples, IPA, or other
 * learner-facing prose are linguistically accurate.
 *
 * @param array $entry Entry data to validate.
 *
 * @return bool True when the entry satisfies the checks; otherwise false.
 */
function validateEntry(array $entry): bool
{
    if (
        !isset($entry['type'])
        || !is_string($entry['type'])
        || !in_array($entry['type'], supportedEntryTypes(), true)
    ) {
        return false;
    }

    $type = $entry['type'];
    $schemaPath = __DIR__ . '/../db/schema/' . $type . '.php';

    if (!is_file($schemaPath) || !is_readable($schemaPath)) {
        return false;
    }

    $schema = require $schemaPath;

    if (!is_array($schema) || !validateEntryStructure($entry, $schema, $type, '')) {
        return false;
    }

    if (
        !isset($entry['ID'])
        || !is_string($entry['ID'])
        || trim($entry['ID']) === ''
        || $entry['type'] !== $type
        || !isset($entry['language_level'])
        || !in_array($entry['language_level'], ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'], true)
    ) {
        return false;
    }

    return validateEntrySpecificRules($entry, $type);
}

/**
 * Recursively compare entry data with a schema's returned prototype array.
 *
 * Non-empty associative schema arrays define fixed records and must contain
 * exactly the same keys. Non-empty list prototypes define the shape of each
 * list item. Empty list prototypes are checked using their field name and
 * entry type, because an empty PHP array does not itself specify an item type.
 *
 * @param mixed  $value     Value supplied by the entry.
 * @param mixed  $prototype Corresponding value in the schema prototype.
 * @param string $type      Entry type.
 * @param string $path      Dot-separated path used for nested checks.
 *
 * @return bool
 */
function validateEntryStructure($value, $prototype, string $type, string $path): bool
{
    if (!is_array($prototype)) {
        if ($prototype === null) {
            return $value === null || is_string($value);
        }

        if (is_string($prototype)) {
            return is_string($value);
        }

        if (is_int($prototype)) {
            return is_int($value);
        }

        if (is_float($prototype)) {
            return is_float($value) || is_int($value);
        }

        if (is_bool($prototype)) {
            return is_bool($value);
        }

        return gettype($value) === gettype($prototype);
    }

    if (!is_array($value)) {
        return false;
    }

    if ($prototype === []) {
        if (!isEntryList($value)) {
            return false;
        }

        foreach ($value as $item) {
            if (!validateEmptyPrototypeListItem($item, $type, $path)) {
                return false;
            }
        }

        return true;
    }

    if (isEntryList($prototype)) {
        if (!isEntryList($value)) {
            return false;
        }

        // Schema lists may include multiple illustrative records. Each real
        // item must conform to the first record's shape.
        $itemPrototype = $prototype[0];

        foreach ($value as $item) {
            if (!validateEntryStructure($item, $itemPrototype, $type, $path . '[]')) {
                return false;
            }
        }

        return true;
    }

    // Associative arrays represent fixed records, not arbitrary dictionaries.
    if (isEntryList($value)) {
        return false;
    }

    $expectedKeys = array_keys($prototype);
    $actualKeys = array_keys($value);

    sort($expectedKeys);
    sort($actualKeys);

    if ($expectedKeys !== $actualKeys) {
        return false;
    }

    foreach ($prototype as $key => $childPrototype) {
        $childPath = $path === '' ? (string) $key : $path . '.' . $key;

        if (!validateEntryStructure($value[$key], $childPrototype, $type, $childPath)) {
            return false;
        }
    }

    return true;
}

/**
 * Determine whether an array has consecutive integer keys starting at zero.
 *
 * This helper avoids depending on array_is_list(), which is only available
 * from PHP 8.1 onwards.
 *
 * @param array $value Array to inspect.
 *
 * @return bool
 */
function isEntryList(array $value): bool
{
    $expectedKey = 0;

    foreach ($value as $key => $_item) {
        if ($key !== $expectedKey) {
            return false;
        }

        $expectedKey++;
    }

    return true;
}

/**
 * Validate an item in a schema field whose prototype is an empty list.
 *
 * Most empty lists in the schemas are lists of strings. A few fields contain
 * structured records even when the schema's illustrative list is empty; those
 * are handled explicitly here.
 *
 * @param mixed  $item Item to validate.
 * @param string $type Entry type.
 * @param string $path Dot-separated path to the list.
 *
 * @return bool
 */
function validateEmptyPrototypeListItem($item, string $type, string $path): bool
{
    $field = substr($path, (int) strrpos('.' . $path, '.'));

    if ($type === 'conversation' && $field === 'content') {
        return is_array($item)
            && !isEntryList($item)
            && array_keys($item) === ['speaker', 'text', 'ipa']
            && is_string($item['speaker'])
            && is_string($item['text'])
            && is_string($item['ipa']);
    }

    if ($type === 'monologue' && $field === 'content') {
        return is_array($item)
            && !isEntryList($item)
            && array_keys($item) === ['text', 'ipa']
            && is_string($item['text'])
            && is_string($item['ipa']);
    }

    if ($type === 'conversation' && $field === 'participants') {
        return is_array($item)
            && !isEntryList($item)
            && array_keys($item) === ['speaker', 'role']
            && is_string($item['speaker'])
            && is_string($item['role']);
    }

    return is_string($item);
}

/**
 * Apply constraints that are specific to an entry type.
 *
 * These checks supplement the shape checks with controlled values documented
 * in the schemas. Type-specific wrappers are kept separate so each schema can
 * add further rules without turning validateEntry() into a large conditional.
 *
 * @param array  $entry Entry data.
 * @param string $type  Declared entry type.
 *
 * @return bool
 */
function validateEntrySpecificRules(array $entry, string $type): bool
{
    $validator = [
        'word' => 'validateWordEntry',
        'idiom' => 'validateIdiomEntry',
        'collocation' => 'validateCollocationEntry',
        'phrasal_verb' => 'validatePhrasalVerbEntry',
        'proverb' => 'validateProverbEntry',
        'grammar' => 'validateGrammarEntry',
        'reading' => 'validateReadingEntry',
        'essay' => 'validateEssayEntry',
        'letter' => 'validateLetterEntry',
        'conversation' => 'validateConversationEntry',
        'monologue' => 'validateMonologueEntry',
    ][$type];

    return $validator($entry);
}

/** @param array $entry @return bool */
function validateWordEntry(array $entry): bool
{
    foreach ($entry['parts_of_speech'] as $part) {
        if (!in_array($part['part_of_speech'], [
            'noun', 'verb', 'adjective', 'adverb', 'preposition',
            'conjunction', 'pronoun', 'determiner', 'interjection',
        ], true)) {
            return false;
        }
    }

    return true;
}

/** @param array $entry @return bool */
function validateIdiomEntry(array $entry): bool
{
    return validateOptionalRegister($entry['register']);
}

/** @param array $entry @return bool */
function validateCollocationEntry(array $entry): bool
{
    return true;
}

/** @param array $entry @return bool */
function validatePhrasalVerbEntry(array $entry): bool
{
    return in_array($entry['transitivity'], ['transitive', 'intransitive', 'both'], true)
        && in_array($entry['separability'], ['separable', 'inseparable', 'both', 'not_applicable'], true)
        && validateOptionalRegister($entry['register']);
}

/** @param array $entry @return bool */
function validateProverbEntry(array $entry): bool
{
    return in_array($entry['register'], [
        'neutral', 'formal', 'informal', 'humorous', 'ironic', 'sarcastic',
        'traditional', 'literary', 'dated', 'regional', 'religious', 'offensive',
    ], true);
}

/** @param array $entry @return bool */
function validateGrammarEntry(array $entry): bool
{
    return true;
}

/** @param array $entry @return bool */
function validateReadingEntry(array $entry): bool
{
    return $entry['source'] === null || is_string($entry['source']);
}

/** @param array $entry @return bool */
function validateEssayEntry(array $entry): bool
{
    return true;
}

/** @param array $entry @return bool */
function validateLetterEntry(array $entry): bool
{
    return true;
}

/** @param array $entry @return bool */
function validateConversationEntry(array $entry): bool
{
    $participants = [];

    foreach ($entry['participants'] as $participant) {
        if ($participant['speaker'] === '' || isset($participants[$participant['speaker']])) {
            return false;
        }

        $participants[$participant['speaker']] = true;
    }

    foreach ($entry['content'] as $turn) {
        if (!isset($participants[$turn['speaker']])) {
            return false;
        }
    }

    return true;
}

/** @param array $entry @return bool */
function validateMonologueEntry(array $entry): bool
{
    return true;
}

/**
 * Validate the nullable register convention used by idiom and phrasal-verb
 * schemas: null means that no single label is appropriate; otherwise the
 * value must be one of the documented labels.
 *
 * @param mixed $register Register value.
 *
 * @return bool
 */
function validateOptionalRegister($register): bool
{
    return $register === null || in_array($register, [
        'neutral', 'formal', 'informal', 'very informal', 'slang', 'vulgar',
        'offensive', 'dated', 'literary', 'regional', 'technical',
    ], true);
}

/**
 * Render an entry with its matching PHP template and return the rendered text.
 *
 * The template is selected using the entry's supported "type" value and is
 * loaded from src/templates/<type>.php. Output buffering captures the template
 * output instead of sending it directly to the caller.
 *
 * Invalid entries and missing templates raise an InvalidArgumentException or
 * RuntimeException respectively. If a template throws an exception, the output
 * buffer is cleaned before the exception is rethrown.
 *
 * @param array $entry Entry data to render.
 *
 * @return string Rendered entry text.
 *
 * @throws InvalidArgumentException If the entry has no supported type.
 * @throws RuntimeException If the matching template is missing or unreadable.
 */
function renderEntry(array $entry): string
{
    if (
        !isset($entry['type'])
        || !is_string($entry['type'])
        || !in_array($entry['type'], supportedEntryTypes(), true)
    ) {
        throw new InvalidArgumentException('Cannot render an entry without a supported type.');
    }

    $templatePath = __DIR__ . '/templates/' . $entry['type'] . '.php';

    if (!is_file($templatePath) || !is_readable($templatePath)) {
        throw new RuntimeException('The entry template is missing or unreadable: ' . $entry['type']);
    }

    ob_start();

    try {
        // Make only $entry available as the template's input variable.
        (static function (string $file, array $entry): void {
            require $file;
        })($templatePath, $entry);

        $rendered = ob_get_contents();

        if ($rendered === false) {
            throw new RuntimeException('Unable to capture the rendered entry output.');
        }

        return $rendered;
    } catch (Throwable $exception) {
        throw $exception;
    } finally {
        ob_end_clean();
    }
}
