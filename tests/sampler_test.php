<?php

require_once __DIR__ . '/../src/sampler.php';

function samplerAssert(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$configQuotas = loadReviewSampleQuotas(__DIR__ . '/../config.ini');
$renderedReview = renderReviewMarkdown([
    'generated_at' => '2026-10-19T12:00:00Z',
    'items' => [
        ['type' => 'word', 'ID' => 'hello'],
        ['type' => 'phrasal_verb', 'ID' => 'look after'],
    ],
]);
samplerAssert(str_contains($renderedReview, '[hello](dist/word/hello.md)'), 'Review item must link to its Markdown file.');
samplerAssert(str_contains($renderedReview, '[look after](dist/phrasal_verb/look%20after.md)'), 'Review link must URL-encode entry IDs.');
samplerAssert(str_contains(renderReviewMarkdown(['items' => []]), 'No entries are currently eligible'), 'Empty review sample should be explained.');
samplerAssert(($configQuotas['8h-2d']['word'] ?? null) === 3, 'INI words quota was not mapped correctly.');
samplerAssert(($configQuotas['32d+']['reading'] ?? null) === 1, 'INI segment/type mapping failed.');

$temporaryDirectory = sys_get_temp_dir() . '/english-sampler-test-' . bin2hex(random_bytes(6));
$stateFile = $temporaryDirectory . '/state.json';

try {
    $now = new DateTimeImmutable('2026-10-19T12:00:00Z');
    $entries = [
        'word' => [
            'eligible' => [
                'is_valid' => true,
                'discovered_at' => '2026-10-19T00:00:00Z',
                'selected_count' => 0,
            ],
            'too_new' => [
                'is_valid' => true,
                'discovered_at' => '2026-10-19T08:30:00Z',
                'selected_count' => 0,
            ],
            'invalid' => [
                'is_valid' => false,
                'discovered_at' => '2026-10-19T00:00:00Z',
                'selected_count' => 0,
            ],
        ],
    ];
    $quotas = ['8h-2d' => ['word' => 1]];

    $first = generateReviewSample($entries, $quotas, $stateFile, $now);
    samplerAssert(count($first['items']) === 1, 'Expected exactly one sampled entry.');
    samplerAssert($first['items'][0] === ['type' => 'word', 'ID' => 'eligible'], 'Eligibility filtering failed.');

    $state = json_decode((string) file_get_contents($stateFile), true, 512, JSON_THROW_ON_ERROR);
    samplerAssert($state['history']['word/eligible']['selected_count'] === 1, 'Selection count should increment once.');

    $cached = generateReviewSample($entries, $quotas, $stateFile, $now->modify('+1 hour'));
    samplerAssert($cached['generated_at'] === $first['generated_at'], 'Expected cached sample within four hours.');
    $state = json_decode((string) file_get_contents($stateFile), true, 512, JSON_THROW_ON_ERROR);
    samplerAssert($state['history']['word/eligible']['selected_count'] === 1, 'Cache hit must not increment selection count.');

    $fresh = generateReviewSample($entries, $quotas, $stateFile, $now->modify('+4 hours +1 second'));
    samplerAssert($fresh['generated_at'] !== $first['generated_at'], 'Expected a fresh sample after cache expiry.');
    $state = json_decode((string) file_get_contents($stateFile), true, 512, JSON_THROW_ON_ERROR);
    samplerAssert($state['history']['word/eligible']['selected_count'] === 2, 'Fresh sample should increment selection count once.');

    echo "Sampler tests passed.\n";
} finally {
    if (is_file($stateFile)) {
        unlink($stateFile);
    }
    if (is_file($stateFile . '.lock')) {
        unlink($stateFile . '.lock');
    }
    if (is_dir($temporaryDirectory)) {
        rmdir($temporaryDirectory);
    }
}
