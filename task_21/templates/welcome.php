<?php require_once __DIR__ . '/../functions/database.php'; ?>

<?php if (user_is_auth(database_connection())): ?>

    <section class="main-block">

        <?php require __DIR__ . '/alerts.php'; ?>

        <p class="main-content">

            Congratulations!
            <br>
            You can become a 10xdeveloper
            <br>
            You just need to watch that video 1000001 times

        </p>

    </section>

    <section class="video">

        <iframe width="600" height="315" src="https://www.youtube.com/embed/1gI_HGDgG7c" title="YouTube video player"
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

<?php endif ?>

