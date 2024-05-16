<?php

namespace Entities;

class Character {
    private int $character_id;

    private string $character;

    public function displayCharacter() {
        return '<div class="check-field">
<input type="checkbox" class="checkbox" id="' . $this->character . '" name="' . $this->character . '" checked />
<label for="' . $this->character . '">' . $this->character . '</label>
            </div>';
    }

}
