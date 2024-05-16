
<?php

use Factories\PdoFactory;
use Models\ProductModel;

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Entities/Product.php';

$db = PdoFactory::connect();

$products = ProductModel::getProducts($db);
$categories = ProductModel::getCategories($db);
$characters = ProductModel::getCharacters($db);

//echo '<pre>';
//var_dump($categories);
//echo '</pre>';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Robot Store</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
<section class="container">
    <form class="filter-options">

            <h3 id="category-title">Categories</h3>
        <?php
        foreach ($categories as $category) {
            echo $category->displayCategory();
        }
        ?>
        <h3>Characters</h3>
        <?php
        foreach ($characters as $character) {
            echo $character->displayCharacter();
        }
        ?>

    </form>
    <div class="cards">
<?php
    foreach ($products as $product) {
        echo $product->displayHP();
    }

    ?>
    </div>
</section>
</body>
</html>


