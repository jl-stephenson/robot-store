<?php

namespace Entities;

class Category {
    public int $category_id;

    public string $category;

    public function displayCategory() {
        return '<div class="check-field">
<input type="checkbox" class="checkbox" id="' . $this->category . '" name="' . $this->category_id . '" checked />
<label for="' . $this->category . '">' . $this->category . '</label>
            </div>';
    }

}
