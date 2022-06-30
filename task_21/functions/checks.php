<?php

function check_request_method(): void
{
    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        set_alert('error', 'Method not allowed');

        header('Location: /git-repos/php-basic-hometasks/task_21/registration.php');

        exit();
    }
}

function check_data_existance(...$keys): void
{
    foreach ($keys as $key) {

        if(!isset($_POST[$key])) {
            set_alert('error', 'Login, E-mail and password are required');

            header('Location: /git-repos/php-basic-hometasks/task_21/registration.php');

            exit();
        }

    }
}