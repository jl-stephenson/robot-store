
<?php

use Factories\PdoFactory;
use Models\ProductModel;

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Entities/Product.php';

//$db = new PDO ('mysql:host=DB;dbname=robot-store', 'root', 'password');

$db = PdoFactory::connect();

$products = ProductModel::getProducts($db);

//echo '<pre>';
//var_dump($products);
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
</head>
<body>
<section class="flex-container">
<?php
    foreach ($products as $product) {
        echo $product->displayHP();
    }

    ?>
</section>
</body>
</html>


