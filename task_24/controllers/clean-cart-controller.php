<?php

require_once __DIR__.'/../functions/cookie.php';

// 1. Clean cookie with products ids

clean_cookie('productIDs');

// 2. Go back to the home page

header('Location: /git-repos/php-basic-hometasks/task_24/index.php');

exit();

