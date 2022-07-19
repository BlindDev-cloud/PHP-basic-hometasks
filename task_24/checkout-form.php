<?php

session_start();

require_once __DIR__ . '/functions/alerts.php';
require_once __DIR__ . '/functions/templates.php';

if (empty($_COOKIE['productIDs'])) {

    header('Location: /git-repos/php-basic-hometasks/task_24/index.php');

    exit();
}

$alerts = get_alerts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<header>

    <div class="container">

        <div class="row">

            <div class="col col-lg-2">

                <a href="checkout.php" class="btn btn-lg btn-light d-block w-100 mt-3">
                    &#8592 Back
                </a>

            </div>

        </div>

    </div>

</header>

<main>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col col-lg-4 my-4">

                <form action="controllers/checkout-controller.php" method="post">

                    <div class="mb-3">

                        <label for="name" class="form-label">
                            Full Name
                        </label>
                        <input type="text" id="name" name="name" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label for="email" class="form-label">
                            E-mail
                        </label>
                        <input type="email" id="email" name="email" class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label for="phone" class="form-label">
                            Phone Number
                        </label>

                        <div class="row">

                            <div class="col-sm-1 mr-3">

                                <p class="form-text text-center">+380</p>

                            </div>

                            <div class="col-sm">

                                <input type="text" id="phone" name="phone" class="form-control" required>
                                <small class="form-text text-muted">
                                    Enter the last 9 digits of your phone number
                                </small>

                            </div>

                        </div>

                    </div>

                    <?php echo get_template_contents(__DIR__ . '/templates/alerts.php', [
                        'alerts' => $alerts
                    ]); ?>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-lg btn-success d-block w-100">
                            Checkout
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</main>


</body>
</html>