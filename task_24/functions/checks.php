<?php

declare(strict_types=1);

function check_request_method(): void
{
    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        set_alert('alert-danger', 'Method not allowed');

        header('Location: ' . $_SERVER['HTTP_REFERER']);

        exit();
    }
}

function check_data_existence(mixed ...$variables): void
{
    foreach ($variables as $variable) {

        if (null === $variable) {
            set_alert('alert-danger', 'All data are required');

            header('Location: ' . $_SERVER['HTTP_REFERER']);

            exit();
        }

    }
}

function check_email(string $email): void
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_alert('alert-warning', 'Isn`t email');

        header('Location: ' . $_SERVER['HTTP_REFERER']);

        exit();
    }
}

function check_product_id(): void
{
    if (!isset($_GET['id']) || !is_numeric($_GET['id']) || !product_exists((int)($_GET['id']))) {
        http_response_code(404);

        exit();
    }
}

function check_phone_number(string $phone): void
{
   if(!preg_match('/^\d{9}$/', $phone)){
       set_alert('alert-warning', 'Isn`t phone number');

       header('Location: ' . $_SERVER['HTTP_REFERER']);

       exit();
   }
}

