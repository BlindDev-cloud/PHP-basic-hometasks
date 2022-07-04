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

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    set_alert('error', 'Not an E-mail');

    header('Location: /git-repos/php-basic-hometasks/task_21/registration.php');

    exit();
}

// 3. Register user

$userdata = [
    'login' => $login,
    'email' => $email,
    'password' => $password
];

if(!user_register(database_connection(), $userdata)){
    set_alert('warning', 'User already exists');

    header('Location: /git-repos/php-basic-hometasks/task_21/registration.php');

    exit();
}

// 4. Authenticate registered user

$_SESSION['auth'] = $login;

// 5. Go back to home page

set_alert('success', 'Welcome '.$login.'!');

header('Location: /git-repos/php-basic-hometasks/task_21/index.php');
