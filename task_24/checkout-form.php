<?php

session_start();

if (empty($_COOKIE['productIDs'])) {

    header('Location: /git-repos/php-basic-hometasks/task_24/index.php');

    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                        <input type="text" id="phone" name="phone" class="form-control" required>

                    </div>

                    <?php require_once __DIR__ . '/templates/alerts.php'; ?>

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