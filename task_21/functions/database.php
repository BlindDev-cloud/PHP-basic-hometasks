<?php

function database_connection() :PDO
{
    static $connection = null;

    if(null === $connection){
        $dsn = 'mysql:host=mysql;port=3306;dbname=db;charset=utf8mb4';

        $connection = new PDO($dsn, username: 'root', password: 'root', options: [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    return $connection;
}

function user_register(PDO $database, array $data) :bool
{
    $queryString = 'SELECT `login`, `email` FROM `users`';

    $statement = $database->query($queryString);

    while($user = $statement->fetch()){
        if($data['email'] === $user['email']
                || $data['login'] === $user['login']){
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

function user_auth(PDO $database, string $login, string $password) :bool
{
    $queryString = 'SELECT `login`, `password` FROM `users`';

    $statement = $database->query($queryString);

    $users = $statement->fetchAll();

    $logins = array_column($users, 'login');
    $passwords = array_column($users, 'password');

    if(!in_array($login, $logins) || !in_array($password, $passwords)){
        return false;
    }

    $_SESSION['auth'] = $login;

    return true;
}

function user_is_auth(PDO $database) :bool
{

    $queryString = 'SELECT `login` FROM `users`';

    $statement = $database->query($queryString);

    $users = $statement->fetchAll();

    $logins = array_column($users, 'login');

    if(in_array($_SESSION['auth'], $logins) && !empty($_SESSION['auth'])){
        return true;
    }

    return false;
}