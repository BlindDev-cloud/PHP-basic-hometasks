<?php

session_start();

require_once __DIR__.'/../functions/database.php';
require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__.'/../functions/checks.php';

// 1. Check request

check_request_method();

// 2. Validate data

check_data_existence('login', 'password');

$login = strip_tags(trim($_POST['login']));
$password = md5($_POST['password']);

// 3. Check user isn`t already authenticated

if(user_is_auth()){
    set_alert('warning', 'You are already authenticated');

    header('Location: /git-repos/php-basic-hometasks/task_21/authentication.php');

    exit();
}

// 4. Check user registration and password fit and authenticate user

if(!user_auth(database_connection(), $login, $password)){
    set_alert('error', 'User does not exist or wrong password');

    header('Location: /git-repos/php-basic-hometasks/task_21/authentication.php');

    exit();
}

// 5. Go back to the home page

set_alert('success', 'Welcome '.$login.'!');

header('Location: /git-repos/php-basic-hometasks/task_21/index.php');
