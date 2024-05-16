<?php
namespace Models;


require_once 'src/Entities/Product.php';
require_once 'src/Entities/Category.php';
require_once 'src/Entities/Character.php';

use Entities\Character;
use Entities\Category;
use Entities\Product;
use PDO;



class ProductModel {
    public static function getProducts(PDO $db) : array {
        $query = $db->prepare('SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $products = $query->fetchAll();
    }
    public static function getCategories(PDO $db) {
        $query = $db->prepare('SELECT `category_id`, `category` FROM `products` GROUP BY `category_id`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Category::class);
        return $categories = $query->fetchAll();
    }

    public static function getCharacters(PDO $db) {
        $query = $db->prepare('SELECT `character_id`, `character` FROM `products` GROUP BY `character_id`;');
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, Character::class);
        return $characters = $query->fetchAll();
    }

    public static function getProductById (PDO $db, int $id) {
        $query = $db->prepare('SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products` WHERE `id` = :id;');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        return $product = $query->fetch();
    }
    public static function getSelectedProducts(PDO $db, array $selectedItems) : array
    {
//        TODO how to get the quotes off the string ['id' =>  $stringSelectedItems]
        $stringSelectedItems = trim( '(' . join(" , ", $selectedItems) . ')', '"');
//            echo "<pre>";
//            var_dump($stringSelectedItems);
//            echo "</pre>";
            $query = $db->prepare('SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products` WHERE `category_id` IN' . $stringSelectedItems . ';');
            $query->execute();
            $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
            $products = $query->fetchAll();

        return $products;


    }

}

