<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authentication</title>
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/alerts.css">
</head>
<body>

<form action="scripts/authentication-controller.php" method="post">

    <fieldset>

        <legend>Authentication</legend>

        <p>
            <label for="login">Login</label>
            <input type="text" name="login" id="login" required>
            <br>
        </p>

        <p>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
        </p>

        <?php require __DIR__ . '/templates/alerts.php'; ?>

        <button type="submit">Submit</button>

    </fieldset>

</form>

</body>
</html>