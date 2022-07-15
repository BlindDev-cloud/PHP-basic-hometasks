<?php

require_once __DIR__ . '/functions/products.php';
require_once __DIR__ . '/functions/checks.php';

check_product_id();

$id = $_GET['id'];

$product = get_product($id);

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

<?php require __DIR__ . '/templates/header.php' ?>

<main>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col col-lg-6">

                <div class="card">

                    <img src="<?php echo $product['image']; ?>" alt="" class="card-img-top">

                    <div class="card-body">

                        <h5 class="card-title">
                            <?php echo $product['name']; ?>
                        </h5>

                        <p class="card-text">
                            <?php echo $product['price']; ?>
                        </p>

                        <button type="button" class="btn btn-lg btn-success d-block w-100">
                            <a href="controllers/add-to-cart-controller.php?id=<?php echo $id; ?>" class="nav-link">
                                Add To Cart
                            </a>
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

</body>
</html>