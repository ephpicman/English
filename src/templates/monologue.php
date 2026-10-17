<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Purpose:** <?= $entry['purpose'] ?>
- **Register:** <?= $entry['register'] ?>

<?php foreach ($entry['content'] as $paragraph): ?>
<?= $paragraph ?>

<?php endforeach; ?>

<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
