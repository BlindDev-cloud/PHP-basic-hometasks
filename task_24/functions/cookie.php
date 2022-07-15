<?php

declare(strict_types=1);

function clean_cookie(string $name) : void
{
    setcookie($name, '', time() - 60, path: '/');
}
