<?php

function database_connection(): PDO
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

function user_register(PDO $database, array $data): bool
{
    $queryString = 'SELECT `login`, `email` FROM `users`';

    $statement = $database->query($queryString);

    while ($user = $statement->fetch()) {
        if ($data['email'] === $user['email'] ||
            $data['login'] === $user['login']) {
            return false;
        }
    }

    $queryString = 'INSERT INTO `users` (`login`, `email`, `password`)
                     VALUES (
                            :userLogin,
                            :userEmail,
                            :userPassword
                    )';

    $statement = $database->prepare($queryString);

    $statement->execute([
        'userLogin' => $data['login'],
        'userEmail' => $data['email'],
        'userPassword' => $data['password']
    ]);

    return true;
}

function user_auth(PDO $database, string $login, string $password): bool
{
    $queryString = 'SELECT `login`, `password` FROM `users`';

    $statement = $database->query($queryString);

    $isRegistered = false;

    while ($user = $statement->fetch()) {
        if ($login === $user['login'] && $password === $user['password']) {
            $isRegistered = true;
            break;
        }
    }

    if (!$isRegistered) {
        return false;
    }

    $path = '/';

    setcookie('auth', $login, cookie_lifetime(), $path);

    return true;
}

function user_is_auth(): bool
{
    return !empty($_COOKIE['auth']);
}

function cookie_lifetime(): int
{
    return time() + 60 * 15;
}

function flush_auth(): void
{
    $path = '/';

    setcookie('auth', '', time() - 60, $path);
}