<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>

<?= $entry['explanation'] ?>

<?php if (!empty($entry['grammar_patterns'])): ?>
## Grammar patterns

<?php foreach ($entry['grammar_patterns'] as $pattern): ?>
- <?= $pattern ?>

<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($entry['examples'])): ?>
## Examples

<?php foreach ($entry['examples'] as $example): ?>
- <?= $example ?>

<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
