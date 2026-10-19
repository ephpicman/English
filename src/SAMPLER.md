# Review sampler

`sampler.php` provides the review sampler used directly by `src/discover.php`. Each discovery run checks `build/review-sample.json`; a valid four-hour cache is reused without resampling or changing counts. When the cache expires, discovery generates a new sample and persists it in that file.

## Calling the sampler

Require `src/sampler.php`, load the registry, provide a quota map, and choose a writable state-file path:

```php
require_once __DIR__ . '/src/sampler.php';

$entries = require __DIR__ . '/build/entries.php';
$quotas = [
    '8h-2d' => [],
    '2d-4d' => [],
    '4d-8d' => [],
    '8d-16d' => [],
    '16d-32d' => [],
    '32d+' => [],
];

$sample = generateReviewSample($entries, $quotas, __DIR__ . '/var/sampler-state.json');
```

`config.ini` in the repository root is the source of truth for the per-segment quotas used by discovery. Edit that file to change counts; the sampler maps `segment-1` through `segment-6` to the six age ranges and plural INI keys (such as `words` and `phrasal_verbs`) to canonical entry types. Missing type quotas mean zero. Quotas must be non-negative integers. `loadReviewSampleQuotas()` validates the file and rejects unknown sections, unknown type names, or invalid values.

## Behaviour

- Entries must be marked `is_valid = true` and at least eight hours old.
- Age segments are 8h–2d, 2d–4d, 4d–8d, 8d–16d, 16d–32d, and 32d or older.
- Each segment/type quota is sampled without replacement.
- Selection uses the global history for an entry, with weight `1 / (1 + selected_count)`; history is not split by age segment.
- The first call generates a sample and increments history once for each selected entry. Calls during the four-hour cache window return the same sample without incrementing history.
- History and the cached sample live in the writable JSON state file. The state file and its lock file must survive between calls and must not be reset during normal deployments.
- The state file is runtime data, not a generated registry. Do not commit it.

The content-discovery workflow calls `generateReviewSample()` and renders the current sample to the root-level `REVIEW.md`. Every sampled item links to its generated Markdown entry under `dist/<type>/<ID>.md`. The list is refreshed whenever discovery runs; while the sampler's four-hour cache remains valid, the same sample is rendered again.
