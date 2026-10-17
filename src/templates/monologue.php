<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Purpose:** <?= $entry['purpose'] ?>
- **Register:** <?= $entry['register'] ?>

<?= $entry['content'] ?>

<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
