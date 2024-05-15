<?php

use Factories\PdoFactory;
use Models\ProductModel;

require_once 'src/Factories/PdoFactory.php';
require_once 'src/Models/ProductModel.php';
require_once 'src/Entities/Product.php';

//$db = new PDO ('mysql:host=DB;dbname=robot-store', 'root', 'password');

$db = PdoFactory::connect();

$products = ProductModel::getProducts($db);

echo '<pre>';
var_dump($products);
echo '</pre>';
