<?php

/**
 * Discover schema files and update the generated schema registry.
 *
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

require_once __DIR__ . '/lib.php';

$root = dirname(__DIR__);
$schemaDirectory = $root . '/db/schema';
$outputFile = $root . '/build/schema.php';

$files = glob($schemaDirectory . '/*.php');

if ($files === false) {
    throw new RuntimeException('Could not list PHP schema files.');
}

sort($files, SORT_STRING);

$schemas = [];

foreach ($files as $file) {
    if (!is_file($file)) {
        continue;
    }

    $type = basename($file, '.php');
    $checksum = hash_file('sha256', $file);

    if ($checksum === false) {
        throw new RuntimeException('Could not calculate checksum for schema: ' . $file);
    }

    $schemas[$type] = [
        'src' => 'db/schema/' . basename($file),
        'checksum' => $checksum,
    ];
}

$content = "<?php\n\nreturn " . var_export($schemas, true) . ";\n";

if (!is_dir(dirname($outputFile))) {
    throw new RuntimeException('The build directory does not exist: ' . dirname($outputFile));
}

$currentContent = is_file($outputFile) ? file_get_contents($outputFile) : false;

if ($currentContent === $content) {
    exit(0);
}

if (file_put_contents($outputFile, $content, LOCK_EX) === false) {
    throw new RuntimeException('Could not write schema registry: ' . $outputFile);
}
