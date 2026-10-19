# Review sampler

`src/sampler.php` provides the review sampler called by `src/discover.php`. Discovery reads and updates `build/review-sample.json`. A valid four-hour cache is reused without resampling or changing selection counts; when the cache expires, a new sample is generated and saved to the state file.

## Calling the sampler

Require `src/sampler.php`, load the entry registry, provide a quota map, and choose a writable state-file path:

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

The example uses a separate state path for illustration. In the repository workflow, `src/discover.php` uses `build/review-sample.json`.

`config.ini` in the repository root is the source of truth for the per-segment quotas used by discovery. Edit that file to change counts; the sampler maps `segment-1` through `segment-6` to the six age ranges and plural INI keys (such as `words` and `phrasal_verbs`) to canonical entry types. Missing type quotas mean zero. Quotas must be non-negative integers. `loadReviewSampleQuotas()` validates the file and rejects unknown sections, unknown type names, or invalid values.

## Behaviour

- Only entries marked `is_valid = true` and at least eight hours old are eligible.
- Age segments are 8h–2d, 2d–4d, 4d–8d, 8d–16d, 16d–32d, and 32 days or older. The lower boundary of each segment is inclusive and the upper boundary is exclusive.
- Each segment/type quota is sampled without replacement.
- Selection uses global history for each entry, with weight `1 / (1 + selected_count)`. History is not split by age segment.
- When a new sample is generated, history is incremented once for each selected entry. Calls within the four-hour cache window return the same sample without incrementing history.
- The JSON state file stores both selection history and the cached sample. In the repository workflow, `build/review-sample.json` is deliberately committed by `.github/workflows/discover.yml`; this preserves history and cache state between separate GitHub Actions runners. Do not delete, reset, or ignore this file during normal operation unless you intentionally want to reset the sampler's history and cache.
- The sampler also opens a sibling `.lock` file to coordinate concurrent access to the state file. The lock file is transient runtime machinery: it is not part of the persisted sampler data and does not need to be committed. Do not remove it while a sampler process may be using it.

## Generated review list

The content-discovery workflow calls `generateReviewSample()` and renders the current sample to the root-level `REVIEW.md`. Each sampled item links to its generated Markdown entry under `dist/<type>/<ID>.md`. Discovery refreshes the file when its contents differ from the current sample. The `Generated at` value is the sample-generation time in UTC, not necessarily the time `REVIEW.md` was last written; during the four-hour cache window, the same sample and timestamp are rendered again.
