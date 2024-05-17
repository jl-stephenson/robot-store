<?php

namespace Entities;

class Character {
    private int $character_id;

    private string $character;

    public int $selection_id;

    public function displayCharacter() {
        return '<div class="check-field">
<input type="checkbox" class="checkbox" id="' . $this->character . '" name="' . $this->character_id * 10 . '" checked />
<label for="' . $this->character . '">' . $this->character . '</label>
            </div>';
    }
    public function setSelectionId() {
        $selection_id = $this->character_id;
        $this->selection_id =  $selection_id * 10;
    }
}
