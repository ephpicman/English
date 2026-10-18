<?php

/**
 * Discover schema, entry, and Markdown files and update their generated registries.
 *
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

require_once __DIR__ . '/lib.php';

$root = dirname(__DIR__);
$dbDirectory = $root . '/db';
$schemaDirectory = $dbDirectory . '/schema';
$distDirectory = $root . '/dist';
$schemaOutputFile = $root . '/build/schema.php';
$entriesOutputFile = $root . '/build/entries.php';
$markdownsOutputFile = $root . '/build/markdowns.php';

$now = gmdate('Y-m-d\\TH:i:s\\Z');

/**
 * Load a PHP file in an isolated scope. Parse/runtime errors are handled by
 * the caller so a broken entry can still be recorded as invalid.
 */
$loadPhpArray = static function (string $file) {
    return (static function (string $path) {
        return require $path;
    })($file);
};

/**
 * Read a registry from disk, returning an empty array when it is unavailable.
 */
$loadRegistry = static function (string $file): array {
    if (!is_file($file)) {
        return [];
    }

    try {
        $registry = require $file;
    } catch (Throwable $exception) {
        return [];
    }

    return is_array($registry) ? $registry : [];
};

/**
 * Write a PHP registry only when its generated contents have changed.
 */
$writeRegistry = static function (string $file, array $registry): void {
    $content = "<?php\n\nreturn " . var_export($registry, true) . ";\n";
    $content = preg_replace('/[ \\t]+$/m', '', $content);

    if (!is_dir(dirname($file))) {
        throw new RuntimeException('The build directory does not exist: ' . dirname($file));
    }

    $currentContent = is_file($file) ? file_get_contents($file) : false;

    if ($currentContent === $content) {
        return;
    }

    if (file_put_contents($file, $content, LOCK_EX) === false) {
        throw new RuntimeException('Could not write registry: ' . $file);
    }
};

// Discover schemas.
$schemaFiles = glob($schemaDirectory . '/*.php');

if ($schemaFiles === false) {
    throw new RuntimeException('Could not list PHP schema files.');
}

sort($schemaFiles, SORT_STRING);
$previousSchemas = $loadRegistry($schemaOutputFile);
$schemas = [];

foreach ($schemaFiles as $file) {
    if (!is_file($file)) {
        continue;
    }

    $type = basename($file, '.php');
    $checksum = hash_file('sha256', $file);

    if ($checksum === false) {
        throw new RuntimeException('Could not calculate checksum for schema: ' . $file);
    }

    $previous = $previousSchemas[$type] ?? null;
    $hasPreviousMetadata = is_array($previous)
        && isset($previous['version'], $previous['discovered_at'], $previous['updated_at']);

    if (!$hasPreviousMetadata) {
        $version = 1;
        $discoveredAt = $now;
        $updatedAt = $now;
    } elseif (($previous['checksum'] ?? null) !== $checksum) {
        $version = (int) $previous['version'] + 1;
        $discoveredAt = $previous['discovered_at'];
        $updatedAt = $now;
    } else {
        $version = (int) $previous['version'];
        $discoveredAt = $previous['discovered_at'];
        $updatedAt = $previous['updated_at'];
    }

    $schemas[$type] = [
        'src' => 'db/schema/' . basename($file),
        'checksum' => $checksum,
        'version' => $version,
        'discovered_at' => $discoveredAt,
        'updated_at' => $updatedAt,
    ];
}

$writeRegistry($schemaOutputFile, $schemas);

// Discover entries. Supported types are always present as top-level keys,
// including before their directories contain any tracked PHP files.
$types = supportedEntryTypes();
$dbDirectories = glob($dbDirectory . '/*', GLOB_ONLYDIR);

if ($dbDirectories === false) {
    throw new RuntimeException('Could not list directories inside db.');
}

foreach ($dbDirectories as $directory) {
    $type = basename($directory);

    if ($type !== 'schema' && !in_array($type, $types, true)) {
        $types[] = $type;
    }
}

sort($types, SORT_STRING);
$previousEntries = $loadRegistry($entriesOutputFile);
$entries = array_fill_keys($types, []);

// Aggregate entry statistics while validating each discovered PHP entry.
$totalEntries = 0;
$entriesByType = array_fill_keys($types, 0);
$validEntries = 0;
$invalidEntries = 0;
$invalidEntryPaths = [];

foreach ($types as $type) {
    $directory = $dbDirectory . '/' . $type;

    if (!is_dir($directory)) {
        continue;
    }

    $files = glob($directory . '/*.php');

    if ($files === false) {
        throw new RuntimeException('Could not list PHP entries in directory: ' . $directory);
    }

    sort($files, SORT_STRING);

    foreach ($files as $file) {
        if (!is_file($file)) {
            continue;
        }

        $totalEntries++;
        $entriesByType[$type]++;

        $ID = basename($file, '.php');
        $checksum = hash_file('sha256', $file);

        if ($checksum === false) {
            throw new RuntimeException('Could not calculate checksum for entry: ' . $file);
        }

        $previous = $previousEntries[$type][$ID] ?? null;
        $hasPreviousMetadata = is_array($previous)
            && isset($previous['version'], $previous['discovered_at'], $previous['updated_at']);

        if (!$hasPreviousMetadata) {
            $version = 1;
            $discoveredAt = $now;
            $updatedAt = $now;
        } elseif (($previous['checksum'] ?? null) !== $checksum) {
            $version = (int) $previous['version'] + 1;
            $discoveredAt = $previous['discovered_at'];
            $updatedAt = $now;
        } else {
            $version = (int) $previous['version'];
            $discoveredAt = $previous['discovered_at'];
            $updatedAt = $previous['updated_at'];
        }

        try {
            $entry = $loadPhpArray($file);
            $isValid = is_array($entry)
                && (($entry['type'] ?? null) === $type)
                && (($entry['ID'] ?? null) === $ID)
                && validateEntry($entry);
        } catch (Throwable $exception) {
            $isValid = false;
        }

        if ($isValid) {
            $validEntries++;
            saveMarkdown($entry);
        } else {
            $invalidEntries++;
            $invalidEntryPaths[] = 'db/' . $type . '/' . basename($file);
        }

        $entries[$type][$ID] = [
            'src' => 'db/' . $type . '/' . basename($file),
            'checksum' => $checksum,
            'version' => $version,
            'discovered_at' => $discoveredAt,
            'updated_at' => $updatedAt,
            'is_valid' => $isValid,
            'last_reviewed_at' => is_array($previous)
                ? ($previous['last_reviewed_at'] ?? null)
                : null,
            'review_count' => is_array($previous)
                ? (int) ($previous['review_count'] ?? 0)
                : 0,
        ];
    }
}

$writeRegistry($entriesOutputFile, $entries);

// Write a stable JSON summary of the discovered entries. Do not include a
// generation timestamp: doing so would create a new commit on every workflow run.
$statistics = [
    'total_entries' => $totalEntries,
    'entries_by_type' => $entriesByType,
    'valid_entries' => $validEntries,
    'invalid_entries' => $invalidEntries,
    'invalid_entry_paths' => $invalidEntryPaths,
];

$statisticsJson = json_encode(
    $statistics,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
);

if ($statisticsJson === false) {
    throw new RuntimeException('Could not encode entry statistics as JSON.');
}

$statisticsOutputFile = $root . '/statistics.json';
if (file_put_contents($statisticsOutputFile, $statisticsJson . "\n", LOCK_EX) === false) {
    throw new RuntimeException('Could not write entry statistics: ' . $statisticsOutputFile);
}

// Discover Markdown files only after entries.php has been updated. The
// registry is grouped by each immediate subdirectory name under dist.
$distDirectories = is_dir($distDirectory)
    ? glob($distDirectory . '/*', GLOB_ONLYDIR)
    : [];

if ($distDirectories === false) {
    throw new RuntimeException('Could not list directories inside dist.');
}

sort($distDirectories, SORT_STRING);
$previousMarkdowns = $loadRegistry($markdownsOutputFile);
$markdowns = [];

foreach ($distDirectories as $directory) {
    $type = basename($directory);
    $markdownFiles = glob($directory . '/*.md');

    if ($markdownFiles === false) {
        throw new RuntimeException('Could not list Markdown files in directory: ' . $directory);
    }

    sort($markdownFiles, SORT_STRING);
    $markdowns[$type] = [];

    foreach ($markdownFiles as $file) {
        if (!is_file($file)) {
            continue;
        }

        $ID = basename($file, '.md');
        $checksum = hash_file('sha256', $file);

        if ($checksum === false) {
            throw new RuntimeException('Could not calculate checksum for Markdown file: ' . $file);
        }

        $previous = $previousMarkdowns[$type][$ID] ?? null;
        $hasPreviousMetadata = is_array($previous)
            && isset($previous['version'], $previous['discovered_at'], $previous['updated_at']);

        if (!$hasPreviousMetadata) {
            $version = 1;
            $discoveredAt = $now;
            $updatedAt = $now;
        } elseif (($previous['checksum'] ?? null) !== $checksum) {
            $version = (int) $previous['version'] + 1;
            $discoveredAt = $previous['discovered_at'];
            $updatedAt = $now;
        } else {
            $version = (int) $previous['version'];
            $discoveredAt = $previous['discovered_at'];
            $updatedAt = $previous['updated_at'];
        }

        $markdowns[$type][$ID] = [
            'src' => 'dist/' . $type . '/' . basename($file),
            'checksum' => $checksum,
            'version' => $version,
            'discovered_at' => $discoveredAt,
            'updated_at' => $updatedAt,
        ];
    }
}

$writeRegistry($markdownsOutputFile, $markdowns);


// Render the repository README as the final discovery task, using the
// statistics persisted to statistics.json as the template's $entry variable.
$statisticsInputFile = $root . '/statistics.json';
$statisticsContent = file_get_contents($statisticsInputFile);

if ($statisticsContent === false) {
    throw new RuntimeException('Could not read entry statistics: ' . $statisticsInputFile);
}

try {
    $entry = json_decode($statisticsContent, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $exception) {
    throw new RuntimeException('Could not decode entry statistics JSON.', 0, $exception);
}

if (!is_array($entry)) {
    throw new RuntimeException('Entry statistics must decode to an associative array.');
}

$readmeTemplateFile = __DIR__ . '/templates/readme.php';

if (!is_file($readmeTemplateFile) || !is_readable($readmeTemplateFile)) {
    throw new RuntimeException('The README template is missing or unreadable.');
}

ob_start();

try {
    (static function (string $file, array $entry): void {
        require $file;
    })($readmeTemplateFile, $entry);

    $readmeContent = ob_get_contents();

    if ($readmeContent === false) {
        throw new RuntimeException('Unable to capture the rendered README content.');
    }
} finally {
    ob_end_clean();
}

$readmeOutputFile = $root . '/README.md';
$currentReadmeContent = is_file($readmeOutputFile)
    ? file_get_contents($readmeOutputFile)
    : false;

if ($currentReadmeContent !== $readmeContent) {
    if (file_put_contents($readmeOutputFile, $readmeContent, LOCK_EX) === false) {
        throw new RuntimeException('Could not write the generated README: ' . $readmeOutputFile);
    }
}
