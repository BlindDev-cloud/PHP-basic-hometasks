<?php

session_start();

require_once __DIR__.'/../functions/database.php';
require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__.'/../functions/checks.php';

// 1. Check request

check_request_method();

// 2. Validate data

check_data_existence('login', 'email', 'password');

$login = strip_tags(trim($_POST['login']));
$email = strip_tags(preg_replace('/\s/', '', $_POST['email']));
$password = md5($_POST['password']);

check_email($email);

// 3. Register user

$userdata = [
    'login' => $login,
    'email' => $email,
    'password' => $password
];

if(!user_register(database_connection(), $userdata)){
    set_alert('warning', 'User already exists');

    header('Location: /git-repos/php-basic-hometasks/task_22/registration.php');

    exit();
}

// 4. Authenticate registered user

setcookie('auth', $login, cookie_lifetime(), '/git-repos/php-basic-hometasks/task_22/');

// 5. Go back to home page

header('Location: /git-repos/php-basic-hometasks/task_22/index.php');
