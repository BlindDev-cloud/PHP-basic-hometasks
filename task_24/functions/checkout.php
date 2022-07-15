<?php

declare(strict_types=1);

require_once __DIR__.'/database.php';

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