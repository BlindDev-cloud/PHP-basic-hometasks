<?php

require_once __DIR__ . '/functions/alerts.php';
require_once __DIR__ . '/functions/templates.php';

session_start();

$productIDS = json_decode($_COOKIE['productIDs'], true) ?? [];

$alerts = get_alerts();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php echo get_template_contents(__DIR__ . '/templates/header.php', [
    'productIDS' => $productIDS
]); ?>

<main>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col col-lg-4 mt-5">

                <form action="controllers/add-product-controller.php" method="post"
                      enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="name" class="form-label">

                            Product Name
                        </label>
                        <input type="text" name="name" id="name"
                               class="form-control" required>

                    </div>

                    <div class="mb-3">

                        <label for="image" class="form-label">
                            Product Image
                        </label>
                        <input type="file" name="image" id="image"
                               class="form-control" required>

                    </div>

                    <div class="mo-3">

                        <label for="price" class="form-label">
                            Product Price
                        </label>
                        <input type="number" name="price" id="price"
                               step="0.01" class="form-control" required>

                    </div>

                    <?php echo get_template_contents(__DIR__ . '/templates/alerts.php', [
                        'alerts' => $alerts
                    ]); ?>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-lg btn-success d-block w-100">
                            Add Product
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</main>

</body>
</html>
