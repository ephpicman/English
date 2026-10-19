<?php

/**
 * Generate and cache Leitner-inspired review samples.
 *
 * The generated entries registry is read-only input. Mutable selection history
 * and the four-hour cached sample are stored separately in a writable JSON
 * state file, so serving a cached sample never increments selection counts.
 */

/** @return array<string, array{min: int, max: int|null}> */
function samplerAgeSegments(): array
{
    return [
        '8h-2d' => ['min' => 8 * 3600, 'max' => 2 * 86400],
        '2d-4d' => ['min' => 2 * 86400, 'max' => 4 * 86400],
        '4d-8d' => ['min' => 4 * 86400, 'max' => 8 * 86400],
        '8d-16d' => ['min' => 8 * 86400, 'max' => 16 * 86400],
        '16d-32d' => ['min' => 16 * 86400, 'max' => 32 * 86400],
        '32d+' => ['min' => 32 * 86400, 'max' => null],
    ];
}

/**
 * Default review quotas, grouped by age segment and entry type.
 *
 * These are starting values and can be adjusted without changing the sampler.
 *
 * @return array<string, array<string, int>>
 */
function defaultReviewSampleQuotas(): array
{
    return [
        '8h-2d' => ['word' => 3, 'grammar' => 1, 'idiom' => 1, 'collocation' => 1, 'phrasal_verb' => 1],
        '2d-4d' => ['word' => 3, 'grammar' => 1, 'idiom' => 1, 'proverb' => 1],
        '4d-8d' => ['word' => 2, 'grammar' => 1, 'collocation' => 1, 'phrasal_verb' => 1, 'reading' => 1],
        '8d-16d' => ['word' => 2, 'grammar' => 1, 'idiom' => 1, 'proverb' => 1, 'conversation' => 1],
        '16d-32d' => ['word' => 2, 'grammar' => 1, 'collocation' => 1, 'monologue' => 1, 'essay' => 1],
        '32d+' => ['word' => 2, 'grammar' => 1, 'phrasal_verb' => 1, 'letter' => 1, 'reading' => 1],
    ];
}

/**
 * Load review quotas from the root INI configuration.
 *
 * INI uses human-readable plural keys and segment-1..segment-6; the sampler
 * internally uses canonical entry types and age-segment keys.
 *
 * @return array<string, array<string, int>>
 */
function loadReviewSampleQuotas(string $configFile): array
{
    if (!is_file($configFile) || !is_readable($configFile)) {
        throw new RuntimeException('Review sampler configuration is missing or unreadable: ' . $configFile);
    }

    $parsed = parse_ini_file($configFile, true, INI_SCANNER_TYPED);
    if (!is_array($parsed)) {
        throw new RuntimeException('Could not parse review sampler configuration: ' . $configFile);
    }

    $segmentNames = [
        'segment-1' => '8h-2d',
        'segment-2' => '2d-4d',
        'segment-3' => '4d-8d',
        'segment-4' => '8d-16d',
        'segment-5' => '16d-32d',
        'segment-6' => '32d+',
    ];
    $typeNames = [
        'words' => 'word',
        'grammar' => 'grammar',
        'idioms' => 'idiom',
        'collocations' => 'collocation',
        'phrasal_verbs' => 'phrasal_verb',
        'proverbs' => 'proverb',
        'readings' => 'reading',
        'conversations' => 'conversation',
        'monologues' => 'monologue',
        'essays' => 'essay',
        'letters' => 'letter',
    ];

    $quotas = [];
    foreach ($segmentNames as $iniSegment => $samplerSegment) {
        $section = $parsed[$iniSegment] ?? [];
        if (!is_array($section)) {
            throw new InvalidArgumentException('Configuration section must contain key/value pairs: ' . $iniSegment);
        }

        $quotas[$samplerSegment] = [];
        foreach ($section as $iniType => $value) {
            if (!isset($typeNames[$iniType])) {
                throw new InvalidArgumentException('Unknown entry type in ' . $iniSegment . ': ' . $iniType);
            }
            if (!is_int($value) || $value < 0) {
                throw new InvalidArgumentException('Quota must be a non-negative integer for ' . $iniSegment . '/' . $iniType);
            }
            $quotas[$samplerSegment][$typeNames[$iniType]] = $value;
        }
    }

    foreach ($parsed as $sectionName => $_section) {
        if (!isset($segmentNames[$sectionName])) {
            throw new InvalidArgumentException('Unknown review sampler configuration section: ' . $sectionName);
        }
    }

    return $quotas;
}


/**
 * Render the current review sample as a root-level Markdown checklist.
 *
 * Each item links to its generated Markdown entry under dist/<type>/<ID>.md.
 *
 * @param array $sample Review sample returned by generateReviewSample().
 * @return string
 */
function renderReviewMarkdown(array $sample): string
{
    $generatedAt = is_string($sample['generated_at'] ?? null)
        ? $sample['generated_at']
        : 'unknown';
    $items = is_array($sample['items'] ?? null) ? $sample['items'] : [];
    $lines = [
        '# Review',
        '',
        'Generated at: ' . $generatedAt . ' (UTC)',
        '',
    ];

    if ($items === []) {
        $lines[] = 'No entries are currently eligible for review.';
    } else {
        foreach ($items as $item) {
            if (
                !is_array($item)
                || !is_string($item['type'] ?? null)
                || !is_string($item['ID'] ?? null)
                || !in_array($item['type'], [
                    'word', 'idiom', 'collocation', 'phrasal_verb', 'proverb',
                    'grammar', 'reading', 'essay', 'letter', 'conversation', 'monologue',
                ], true)
                || $item['ID'] === ''
                || str_contains($item['ID'], '/')
                || str_contains($item['ID'], '\\')
                || str_contains($item['ID'], "\0")
            ) {
                throw new InvalidArgumentException('Review sample contains an invalid item.');
            }

            $type = $item['type'];
            $ID = $item['ID'];
            $path = 'dist/' . rawurlencode($type) . '/' . rawurlencode($ID) . '.md';
            $label = str_replace(['\\\\', '[', ']'], ['\\\\\\\\', '\\\\[', '\\\\]'], $ID);
            $lines[] = '- [' . $label . '](' . $path . ') — ' . str_replace('_', ' ', $type);
        }
    }

    return implode("\n", $lines) . "\n";
}


/**
 * Return the cached sample, or generate and cache a new one.
 *
 * Quotas are specified as $quotas[$segment][$type] = number of entries.
 * For example: ['8h-2d' => ['word' => 5, 'grammar' => 1]].
 *
 * @param array  $entries  Registry shaped like build/entries.php.
 * @param array  $quotas   Per-segment, per-type sample quotas.
 * @param string $stateFile Writable path for persistent sampler state.
 * @param DateTimeImmutable|null $now Optional clock for deterministic tests.
 *
 * @return array{generated_at: string, expires_at: string, items: list<array{type:string, ID:string}>}
 */
function generateReviewSample(
    array $entries,
    array $quotas,
    string $stateFile,
    ?DateTimeImmutable $now = null
): array {
    $now = $now ?? new DateTimeImmutable('now', new DateTimeZone('UTC'));
    $now = $now->setTimezone(new DateTimeZone('UTC'));
    $directory = dirname($stateFile);

    if (!is_dir($directory) && !mkdir($directory, 0775, true) && !is_dir($directory)) {
        throw new RuntimeException('Could not create sampler state directory: ' . $directory);
    }

    $lockPath = $stateFile . '.lock';
    $lock = fopen($lockPath, 'c');

    if ($lock === false) {
        throw new RuntimeException('Could not open sampler lock file.');
    }

    try {
        if (!flock($lock, LOCK_EX)) {
            throw new RuntimeException('Could not lock sampler state.');
        }

        $state = [];
        if (is_file($stateFile)) {
            $raw = file_get_contents($stateFile);
            if ($raw === false) {
                throw new RuntimeException('Could not read sampler state.');
            }
            if (trim($raw) !== '') {
                try {
                    $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
                } catch (JsonException $exception) {
                    throw new RuntimeException('Sampler state contains invalid JSON.', 0, $exception);
                }
                if (!is_array($decoded)) {
                    throw new RuntimeException('Sampler state must be a JSON object.');
                }
                $state = $decoded;
            }
        }

        $nowTimestamp = $now->getTimestamp();
        $cached = $state['cache'] ?? null;
        if (
            is_array($cached)
            && isset($cached['expires_at'], $cached['items'], $cached['generated_at'])
            && is_string($cached['expires_at'])
            && is_array($cached['items'])
        ) {
            $expires = strtotime($cached['expires_at']);
            if ($expires !== false && $expires > $nowTimestamp) {
                return $cached;
            }
        }

        $history = is_array($state['history'] ?? null) ? $state['history'] : [];
        $segments = samplerAgeSegments();
        $items = [];
        $initialCounts = [];

        foreach ($segments as $segmentName => $bounds) {
            $segmentCandidates = [];

            foreach ($entries as $type => $typeEntries) {
                if (!is_string($type) || !is_array($typeEntries)) {
                    continue;
                }

                $quota = $quotas[$segmentName][$type] ?? 0;
                if (!is_int($quota) || $quota < 0) {
                    throw new InvalidArgumentException(
                        'Quota must be a non-negative integer for ' . $segmentName . '/' . $type
                    );
                }
                if ($quota === 0) {
                    continue;
                }

                foreach ($typeEntries as $ID => $metadata) {
                    if (!is_string($ID) || !is_array($metadata) || ($metadata['is_valid'] ?? false) !== true) {
                        continue;
                    }

                    $discoveredAt = $metadata['discovered_at'] ?? null;
                    if (!is_string($discoveredAt)) {
                        continue;
                    }
                    $discoveredTimestamp = strtotime($discoveredAt);
                    if ($discoveredTimestamp === false) {
                        continue;
                    }

                    $age = $nowTimestamp - $discoveredTimestamp;
                    if ($age < $bounds['min'] || ($bounds['max'] !== null && $age >= $bounds['max'])) {
                        continue;
                    }

                    $key = $type . '/' . $ID;
                    $count = max(0, (int) ($history[$key]['selected_count'] ?? $metadata['selected_count'] ?? 0));
                    $initialCounts[$key] = $count;
                    $weight = 1 / (1 + $count);
                    $random = max(1.0e-12, random_int(1, PHP_INT_MAX) / PHP_INT_MAX);
                    // Exponential-race key: lower keys are selected first;
                    // this implements weighted sampling without replacement.
                    $priority = -log($random) / $weight;

                    $segmentCandidates[$type][] = [
                        'type' => $type,
                        'ID' => $ID,
                        'key' => $key,
                        'priority' => $priority,
                    ];
                }
            }

            foreach ($segmentCandidates as $type => $candidates) {
                usort($candidates, static fn(array $a, array $b): int => $a['priority'] <=> $b['priority']);
                $quota = $quotas[$segmentName][$type] ?? 0;
                foreach (array_slice($candidates, 0, $quota) as $candidate) {
                    $items[] = ['type' => $candidate['type'], 'ID' => $candidate['ID']];
                }
            }
        }

        // Only successfully assembled samples affect selection history.
        foreach ($items as $item) {
            $key = $item['type'] . '/' . $item['ID'];
            $previousCount = max(0, (int) ($history[$key]['selected_count'] ?? $initialCounts[$key] ?? 0));
            $history[$key] = [
                'selected_count' => $previousCount + 1,
                'last_selected_at' => $now->format('Y-m-d\TH:i:s\Z'),
            ];
        }

        $sample = [
            'generated_at' => $now->format('Y-m-d\TH:i:s\Z'),
            'expires_at' => $now->modify('+4 hours')->format('Y-m-d\TH:i:s\Z'),
            'items' => $items,
        ];
        $newState = ['history' => $history, 'cache' => $sample];
        $json = json_encode($newState, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
        $temporary = tempnam($directory, '.sampler-state-');

        if ($temporary === false) {
            throw new RuntimeException('Could not create temporary sampler state file.');
        }

        try {
            if (file_put_contents($temporary, $json . "\n", LOCK_EX) === false || !rename($temporary, $stateFile)) {
                throw new RuntimeException('Could not persist sampler state.');
            }
        } finally {
            if (is_file($temporary)) {
                unlink($temporary);
            }
        }

        return $sample;
    } finally {
        flock($lock, LOCK_UN);
        fclose($lock);
    }
}
