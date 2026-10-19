# Review sampler

`sampler.php` is a reusable PHP sampler for the generated registry in `build/entries.php`. It does not modify generated registry files.

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

The quota map deliberately contains no default counts: choose the desired number for each content type and age segment before using the sampler. Missing type quotas mean zero.

## Behaviour

- Entries must be marked `is_valid = true` and at least eight hours old.
- Age segments are 8h–2d, 2d–4d, 4d–8d, 8d–16d, 16d–32d, and 32d or older.
- Each segment/type quota is sampled without replacement.
- Selection uses the global history for an entry, with weight `1 / (1 + selected_count)`; history is not split by age segment.
- The first call generates a sample and increments history once for each selected entry. Calls during the four-hour cache window return the same sample without incrementing history.
- History and the cached sample live in the writable JSON state file. The state file and its lock file must survive between calls and must not be reset during normal deployments.
- The state file is runtime data, not a generated registry. Do not commit it.

The sampler is a callable library; it is not invoked by the content-discovery workflow automatically. The application or command that serves review lists should call `generateReviewSample()` when a sample is requested.
