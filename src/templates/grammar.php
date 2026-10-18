<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>

<?php foreach ($entry['explanation'] as $paragraph): ?>
<?= $paragraph ?>

<?php endforeach; ?>

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

---

This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
