<?php

session_start();

require_once __DIR__ . '/../functions/checks.php';
require_once __DIR__ . '/../functions/checkout.php';
require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__.'/../functions/cookie.php';

// 1. Check request method

check_request_method();

// 2. Validate data

$name = trim(preg_replace('/ \s{2,} /', ' ', strip_tags($_POST['name']))) ?? null;
$email = trim(preg_replace('/ \s /', ' ', strip_tags($_POST['email']))) ?? null;
$phone = trim(preg_replace('/ \s /', '', strip_tags($_POST['phone']))) ?? null;

check_data_existence($name, $email, $phone);

check_email($email);

check_phone_number($phone);

$productList = $_SESSION['products'];

$sum = $_SESSION['sum'];

$_SESSION['products'] = [];
$_SESSION['sum'] = [];


// 3. Create order in database

add_order($name, $email, $phone,
            json_encode($productList), $sum);

// 4. Clean cart

clean_cookie('products');

// 5. Go back to the success message

header('Location: /git-repos/php-basic-hometasks/task_24/checkout-success.php');

exit();