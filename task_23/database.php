<?php

function database_connection(): PDO
{
    static $connection = null;

    if (null === $connection) {
        $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=task_23;charset=utf8mb4';

        $connection = new PDO($dsn, username: 'root', password: 'root', options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    return $connection;
}

function create_user(
    PDO    $database,
    string $name = null,
    int    $age = null,
    string $country = null
): void
{
    $queryString = 'INSERT INTO `users` 
                    (`name`, `age`, `country`)
                    VALUES (
                            :userName,
                            :userAge,
                            :userCountry
                    )';

    $statement = $database->prepare($queryString);

    $statement->execute([
        'userName' => $name,
        'userAge' => $age,
        'userCountry' => $country
    ]);
}

function user_exists(
    PDO $database,
    int $id
): bool
{
    $queryString = 'SELECT * FROM `users`';

    $statement = $database->query($queryString);

    while($user = $statement->fetch()){
        if($id === $user['id']){
            return true;
        }
    }

    return false;
}

function read_user(PDO $database, int $id): array
{
    if(!user_exists($database, $id)){
        exit('User does not exist'.PHP_EOL);
    }

    $queryString = 'SELECT * FROM `users`
                    WHERE `id` = :userID';

    $statement = $database->prepare($queryString);

    $statement->execute(['userID' => $id]);

    return $statement->fetch();
}

function update_user(
    PDO    $database,
    int    $id,
    string $name = null,
    int    $age = null,
    string $country = null
): void
{
    $user = read_user($database, $id);

    $name = $name ?? $user['name'];
    $age = $age ?? $user['age'];
    $country = $country ?? $user['country'];

    $queryString = 'UPDATE `users`
                    SET
                        `name` = :userName,
                        `age` = :userAge,
                        `country` = :userCountry
                        WHERE `id` = :userID';

    $statement = $database->prepare($queryString);

    $statement->execute([
        'userID' => $id,
        'userName' => $name,
        'userAge' => $age,
        'userCountry' => $country
    ]);
}

function delete_user(PDO $database, int $id): void
{
    if(!user_exists($database, $id)){
        exit('User does not exist'.PHP_EOL);
    }

    $queryString = 'DELETE FROM `users`
                    WHERE `id` = :userID';

    $statement = $database->prepare($queryString);

    $statement->execute(['userID' => $id]);

    echo 'user '.$id.' deleted'.PHP_EOL;
}