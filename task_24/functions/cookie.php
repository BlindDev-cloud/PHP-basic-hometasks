<?php

declare(strict_types=1);

function clean_cookie(string $name) : void
{
    setcookie($name, '', time() - 60, path: '/');
}

function get_cookie_content(string $key) :array
{
    if(array_key_exists($key, $_COOKIE)){
        return json_decode($_COOKIE[$key], true);
    }

    return [];
}
