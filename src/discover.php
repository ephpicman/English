<?php

/**
 * Discover schema and entry files and update their generated registries.
 *
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

require_once __DIR__ . '/lib.php';

$root = dirname(__DIR__);
$dbDirectory = $root . '/db';
$schemaDirectory = $dbDirectory . '/schema';
$schemaOutputFile = $root . '/build/schema.php';
$entriesOutputFile = $root . '/build/entries.php';

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
                && validateEntry($entry);
        } catch (Throwable $exception) {
            $isValid = false;
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
