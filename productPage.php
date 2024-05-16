<?php

use Factories\PdoFactory;
use Models\ProductModel;

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Entities/Product.php';

$db = PdoFactory::connect();
$id = $_GET["id"];
if(!empty($id) && is_numeric($id) && $id > 0 &&  $id <= 16) {
    $id = intval($id);
    if($id >= 1 && $id <= 16) {
        $product = ProductModel::getProductById($db, $id);
    } else {
        echo "<h1>Sorry, product not found.</h1>
<a href='index.php'><button>Return Home</button></a>";
        return;
    }
} else {
    echo "<h1>Sorry, product not found.</h1>
<a href='index.php'><button>Return Home</button></a>";
    return;
}
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

