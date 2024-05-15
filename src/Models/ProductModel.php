<?php
namespace Entities;

require_once 'src/Entities/Product.php';

class ProductModel {
    public static function getProducts(PDO $db) : array {
        $query = $db->prepare('SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $products = $query->fetchAll();
    }


}