<?php
namespace Models;


require_once 'src/Entities/Product.php';

use Entities\Product;
use PDO;



class ProductModel {
    public static function getProducts(PDO $db) : array {
        $query = $db->prepare('SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $products = $query->fetchAll();
    }
}