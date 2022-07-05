<?php

function check_request_method(): void
{
    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        set_alert('error', 'Method not allowed');

        header('Location: /git-repos/php-basic-hometasks/task_22/registration.php');

        exit();
    }
}

function check_data_existence(...$keys): void
{
    foreach ($keys as $key) {

        if (!isset($_POST[$key])) {
            set_alert('error', 'Login, E-mail and password are required');

            header('Location: /git-repos/php-basic-hometasks/task_22/registration.php');

            exit();
        }

    }
}

function check_email(string $email): void
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_alert('error', 'Not an E-mail');

        header('Location: /git-repos/php-basic-hometasks/task_22/registration.php');

        exit();
    }
}
