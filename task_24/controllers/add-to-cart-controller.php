<?php

require_once __DIR__.'/../functions/products.php';
require_once __DIR__.'/../functions/checks.php';
require_once __DIR__.'/../functions/cookie.php';

// 1. Check product id

check_product_id();

// 2. Get ids of all added products

$cartIDs = json_decode($_COOKIE['productIDs'], true) ?? null;

// 3. Clean cookie

clean_cookie('productIDs');

// 4. Add new product id to cookie

$id = $_GET['id'];

$cartIDs[] = $id;

setcookie('productIDs', json_encode($cartIDs), time() + (60 * 5), path: '/');

// 5. Go back to catalog

header('Location: '.$_SERVER['HTTP_REFERER']);

exit();