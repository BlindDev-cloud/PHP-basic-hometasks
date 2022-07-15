<?php

session_start();

require_once __DIR__ . '/../functions/checks.php';
require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__ . '/../functions/products.php';

// 1. Check request method

check_request_method();

// 2. Validate data

$name = trim(preg_replace('/ \s{2,} /', ' ', strip_tags($_POST['name']))) ?? null;
$image = $_FILES['image']['name'] ?? null;
$price = preg_replace('/ \D /', '', $_POST['price']) ?? null;

check_data_existence($name, $image, $price);

if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
    set_alert('alert-warning', 'Image is not uploaded');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

$uploadedFileMime = $_FILES['image']['type'];
$allowedMimes = [
    'image/jpeg',
    'image/png'
];

if (!in_array($uploadedFileMime, $allowedMimes)) {
    set_alert('alert-warning', 'Image must be in ".jpg" or ".png" format');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

if (!is_numeric($price)) {
    set_alert('alert-danger', 'Price is not a number');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

// 3. Add image to storage

$storageDirectory = __DIR__ . '/../storage';

$uploadedFileExtension = array_reverse(explode('.', $image))[0];
$uploadedFileName = date('Y-m-d_h:i:s') . '_' . uniqid('', true) . '.' . $uploadedFileExtension;

$uploadedFilePath = $storageDirectory . '/' . $uploadedFileName;

if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFilePath)) {
    set_alert('alert-warning', 'File can not be moved to the storage');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

// 4. Add data to database

$uploadedFileLink = '/git-repos/php-basic-hometasks/task_24/storage/' . $uploadedFileName;

add_product($name, $uploadedFileLink, $price);

// 5. Go back to previous page

set_alert('alert-success', 'Product is successfully added');

header('Location: ' . $_SERVER['HTTP_REFERER']);

exit();