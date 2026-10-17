<?php
?>
# <?= $entry['ID'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Pronunciation (BrE IPA):** /<?= $entry['pronunciation'] ?>/
- **Pattern:** <?= $entry['pattern'] ?>
<?php if (!empty($entry['components'])): ?>
- **Components:** <?= implode(' + ', $entry['components']) ?>
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
<?php foreach (['collocations' => 'Related collocations', 'synonyms' => 'Alternatives', 'antonyms' => 'Contrasting expressions'] as $key => $label): ?>
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
<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
