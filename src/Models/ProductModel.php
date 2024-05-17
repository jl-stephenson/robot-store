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
    public static function getSelectedProducts(PDO $db, array $selectedCategories = [], array $selectedCharacters = []) : array
    {
//  Map the array of strings to an array of integers
        $catIds = array_map(function($categoryId) {
            return $categoryId;
        }, $selectedCategories);

        // Map the array of ints to an array of keys
        $preparedCatIds = array_map(function($v) {
            return ":id$v";
        }, $catIds);

        // Combine arrays into an associative array
        $preparedCatValues = array_combine($preparedCatIds, $catIds);

        // Divide the character ids to match db values
        $selectedCharacterIds = array_map(function($v) {
            return $v / 10;
        }, $selectedCharacters);

        $charIds = array_map(function($characterId) {
            return $characterId;
        }, $selectedCharacterIds);

        $preparedCharIds = array_map(function($v) {
            return ":id$v";
        }, $selectedCharacters);

        $preparedCharValues = array_combine($preparedCharIds, $charIds);
        $combinedValues = array_merge($preparedCatValues, $preparedCharValues);

        $sql = 'SELECT `id`, `title`, `image`, `price`, `category_id`, `category`, `character_id`, `character`, `description`, `image2`, `image3` FROM `products` WHERE `category_id` IN (' . implode(",", $preparedCatIds) . ') OR `character_id` IN (' . implode(",", $preparedCharIds) . ');';

        $query = $db->prepare($sql);
            $query->execute($combinedValues);
            $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
            $products = $query->fetchAll();

        return $products;
    }

}

