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
    return '<div class="product-card">
<a href="./productPage.php?id=' . $this->id . '">
<img src="' . $this->image . '" alt="' . $this->description . '"/>
<p>' . $this->title . '</p>
<p>$' . number_format($this->price, 2) . '</p>
</a>
</div>';
}

public function displayPP() {
    return '<div class="product-container">
        <figure>
        <img class="lg-image" src="' . $this->image . '" alt="' .
        $this->title . '"/> 
        </figure>
        <article class="product-details">
        <h2>' . $this->title . '</h2>
        <h3>$' . number_format($this->price, 2) . '</h3>
        <p>' . $this->description . '</p>
        <a href="index.php"><button>Home</button></a>
</article>';
}

}
