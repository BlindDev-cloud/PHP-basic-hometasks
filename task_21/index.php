<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/alerts.css">
    <title>Becoming a 10xdeveloper</title>
</head>
<body>

<header>

    <nav>
        <a href="authentication.php" class="authenticate">Log in</a>
        <a href="registration.php" class="register">Register</a>
    </nav>

    <br>

    <h1>Becoming a 10xdeveloper</h1>

</header>

<main>

    <?php require 'templates/welcome.php'; ?>

</main>

</body>
</html>