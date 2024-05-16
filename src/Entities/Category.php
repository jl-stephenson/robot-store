<?php

namespace Entities;

class Category {
    private int $category_id;

    private string $category;

    public function displayCategory() {
        return '<div class="check-field">
<input type="checkbox" class="checkbox" id="' . $this->category . '" name="' . $this->category . '" checked />
<label for="' . $this->category . '">' . $this->category . '</label>
            </div>';
    }

}
