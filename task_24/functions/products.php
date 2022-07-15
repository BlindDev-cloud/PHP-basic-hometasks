<?php

declare(strict_types=1);

require_once __DIR__.'/database.php';

function add_product(string $name, string $image, float $price) :void
{
    $connection = get_database_connection();

    $query = 'INSERT INTO `products`
                (`name`, `image`, `price`)
                VALUES
                    (:name, :image, :price)';

    $statement = $connection->prepare($query);

    $statement->execute(compact('name', 'image', 'price'));
}

function get_all_products(int $offset, int $limit) : array
{
    $connection = get_database_connection();

    $query = 'SELECT * FROM `products`
                LIMIT :offset, :limit';

    $statement = $connection->prepare($query);

    $statement->execute(compact('offset', 'limit'));

    return $statement->fetchAll();
}

function count_products() :int
{
    $connection = get_database_connection();

    $query = 'SELECT COUNT(*) AS productsCount FROM `products`';

    $statement = $connection->query($query);

    return (int)$statement->fetch()['productsCount'];
}

function product_exists(int $id) :bool
{
    $connection = get_database_connection();

    $query = 'SELECT `id` FROM `products`';

    $statement = $connection->query($query);

    while($product = $statement->fetch()){
        if($id === $product['id']){
            return true;
        }
    }

    return false;
}

function get_product(int $id) :array
{
    $connection = get_database_connection();

    $query = 'SELECT * FROM `products`
                WHERE :id = `id`';

    $statement = $connection->prepare($query);

    $statement->execute(compact('id'));

    return $statement->fetch();
}