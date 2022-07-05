<?php

require_once __DIR__ . '/../functions/database.php';

// 1. Log out

flush_auth();

// 2. Go back to home page

header('Location: /git-repos/php-basic-hometasks/task_22/index.php');