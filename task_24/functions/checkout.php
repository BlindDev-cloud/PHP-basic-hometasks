<?php

declare(strict_types=1);

require_once __DIR__.'/database.php';
require_once __DIR__.'/products.php';

function add_order(
    string $name,
    string $email,
    string $phone,
    string $products,
    float $sum
):void
{
    $connection = get_database_connection();

    $query = 'INSERT INTO `orders`
                (`name`, `email`, `phone_number`,
                 `list_of_products`, `sum`)
                 VALUES
                     (:name, :email, :phone,
                 :products, :sum)';

    $statement = $connection->prepare($query);

    $statement->execute(compact(
        'name',
        'email',
        'phone',
        'products',
        'sum'
    ));

}

function get_list_of_products(array $ids):array
{
    $uniqueIDs = array_unique($ids);

    $count = 0;

    $productList = [];

    foreach ($uniqueIDs as $uniqueID){

        foreach ($ids as $id){

            if($uniqueID === $id){
                ++$count;
            }

        }

        $product = get_product((int)$uniqueID);

        $name = $product['name'];
        $price = $product['price'];

        $productList[] = compact('name', 'price', 'count');

        $count = 0;
    }

    return $productList;
}