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
<?php if ($turn['ipa'] !== ''): ?>

*<?= $turn['ipa'] ?>*
<?php endif; ?>

<?php endforeach; ?>
<?php if (!empty($entry['educational_notes'])): ?>
## Learning notes

<?php foreach ($entry['educational_notes'] as $note): ?>
- <?= $note ?>

<?php endforeach; ?>
<?php endif; ?>

---

This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
