<?php
?>
# <?= $entry['title'] ?>

- **Level:** <?= $entry['language_level'] ?>
- **Situation:** <?= $entry['situation'] ?>
- **Register:** <?= $entry['register'] ?>

## Participants

<?php foreach ($entry['participants'] as $participant): ?>
- **<?= $participant['speaker'] ?>:** <?= $participant['role'] ?>

<?php endforeach; ?>
## Dialogue

<?php foreach ($entry['content'] as $turn): ?>
**<?= $turn['speaker'] ?>:** <?= $turn['text'] ?>

<?php endforeach; ?>
<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>
