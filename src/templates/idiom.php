<?php
?>
# <?= $entry['ID'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Pronunciation (BrE IPA):** /<?= $entry['pronunciation'] ?>/
<?php if ($entry['register'] !== null && $entry['register'] !== ''): ?>
- **Register:** <?= $entry['register'] ?>
<?php endif; ?>

<?php foreach ($entry['meanings'] as $index => $meaning): ?>
## Meaning <?= $index + 1 ?>

<?= $meaning['definition'] ?>

<?php foreach (['general_examples' => 'Examples', 'professional_examples' => 'Professional examples'] as $key => $label): ?>
<?php if (!empty($meaning[$key])): ?>
**<?= $label ?>**
<?php foreach ($meaning[$key] as $example): ?>
- <?= $example ?>

<?php endforeach; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php foreach (['collocations' => 'Collocations', 'synonyms' => 'Synonyms', 'antonyms' => 'Antonyms'] as $key => $label): ?>
<?php if (!empty($meaning[$key])): ?>
**<?= $label ?>:** <?= implode('; ', $meaning[$key]) ?>

<?php endif; ?>
<?php endforeach; ?>
<?php if (!empty($meaning['educational_notes'])): ?>
**Notes**
<?php foreach ($meaning['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
<?php endforeach; ?>
<?php if (!empty($entry['grammar_patterns'])): ?>
## Grammar patterns

<?php foreach ($entry['grammar_patterns'] as $pattern): ?>
- <?= $pattern ?>

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
