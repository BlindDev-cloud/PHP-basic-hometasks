<?php

declare(strict_types=1);

function get_database_connection(): PDO
{
    static $connection = null;

    if (null === $connection) {
        $dsn = 'mysql:host=mysql;port=3306;dbname=db;charset=utf8mb4';

        $connection = new PDO($dsn, username: 'root', password: 'root', options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    return $connection;
}
