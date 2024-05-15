<?php

namespace Entities;

class Product {
private int $id;
private string $title;
private string $image;
private float $price;
private int $category_id;
private string $category;
private int $character_id;
private string $character;
private string $description;
private string|null $image2;
private string|null $image3;

public function displayHP() {
    return "<div class='product-card'>
<img src='{$this->image}' alt='{$this->description}'/>
<p>{$this->title}</p>
<p>£{$this->price}</p>
</div>";
}

}
