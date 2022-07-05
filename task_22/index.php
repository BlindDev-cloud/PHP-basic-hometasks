<?php

session_start();

require_once __DIR__ . '/functions/database.php';
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

        <?php if (user_is_auth()): ?>

            <script src="scripts/popup.js"></script>

            <button id="logout-button" class="log-out"
                    type="button" onclick="show_form()">

                Log out

            </button>

            <form action="scripts/logout.php" id="popup-form" class="log-out_form" hidden="">

                <fieldset>

                    <p>Do you want to log out?</p>

                    <section>

                        <button type="submit">Yes</button>
                        <button type="button" onclick="close_form()">No</button>

                    </section>

                </fieldset>

            </form>

        <?php else: ?>

            <a href="authentication.php" class="authenticate">Log in</a>
            <a href="registration.php" class="register">Register</a>

        <?php endif; ?>

    </nav>

    <br>

    <h1>Becoming a 10xdeveloper</h1>

</header>

<main>

    <?php if (user_is_auth()): ?>

        <section class="main-block">

            <?php require __DIR__ . '/templates/alerts.php'; ?>

            <p class="main-content">
                Congratulations!
                <br>

                You can become a 10xdeveloper
                <br>

                You just need to watch that video 1000001 times
            </p>

        </section>

        <section class="video">

            <iframe width="600" height="315" src="https://www.youtube.com/embed/1gI_HGDgG7c"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

        </section>

    <?php else: ?>

        <p class="register-message">
            Register and you can become a 10xdeveloper
            <br>

            TRUST ME
        </p>

    <?php endif; ?>

</main>

</body>
</html>