<?php
?>
# <?= $entry['ID'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Pronunciation (BrE IPA):** /<?= $entry['pronunciation'] ?>/

<?php
$formLabels = [
    'plural' => 'Plural',
    'third_person_singular' => 'Third-person singular',
    'past_simple' => 'Past simple',
    'past_participle' => 'Past participle',
    'present_participle' => 'Present participle',
    'comparative' => 'Comparative',
    'superlative' => 'Superlative',
];
$availableForms = [];
foreach ($formLabels as $key => $label) {
    if ($entry['word_forms'][$key] !== null && $entry['word_forms'][$key] !== '') {
        $availableForms[] = "**{$label}:** " . $entry['word_forms'][$key];
    }
}
if ($availableForms !== []):
?>
**Word forms:** <?= implode(' · ', $availableForms) ?>

<?php endif; ?>
<?php foreach ($entry['parts_of_speech'] as $part): ?>
## <?= $part['part_of_speech'] ?>

<?php if (!empty($part['grammar_tags'])): ?>
- **Grammar:** <?= implode(', ', $part['grammar_tags']) ?>

<?php endif; ?>
<?php foreach ($part['meanings'] as $index => $meaning): ?>
### Meaning <?= $index + 1 ?>

<?= $meaning['definition'] ?>

<?php if (!empty($meaning['general_examples'])): ?>
**Examples**
<?php foreach ($meaning['general_examples'] as $example): ?>
- <?= $example ?>

<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($meaning['professional_examples'])): ?>
**Professional examples**
<?php foreach ($meaning['professional_examples'] as $example): ?>
- <?= $example ?>

<?php endforeach; ?>
<?php endif; ?>
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
<?php if (!empty($part['educational_notes'])): ?>
**Part-of-speech notes**
<?php foreach ($part['educational_notes'] as $note): ?>
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
