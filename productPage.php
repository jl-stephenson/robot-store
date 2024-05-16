<?php

use Factories\PdoFactory;
use Models\ProductModel;

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Entities/Product.php';

$db = PdoFactory::connect();
//$products = ProductModel::getProducts($db);
// getProductById
$id = $_GET["id"];
$product = ProductModel::getProductById($db, $id);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
 echo $product->displayPP();
 ?>
</body>
</html>

