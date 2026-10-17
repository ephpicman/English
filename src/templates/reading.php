<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Text type:** <?= $entry['text_type'] ?>
<?php if ($entry['source'] !== null && $entry['source'] !== ''): ?>
- **Source:** <?= $entry['source'] ?>
<?php endif; ?>

<?= $entry['content'] ?>

<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
