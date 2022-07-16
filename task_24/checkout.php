<?php

session_start();

require_once __DIR__ . '/functions/products.php';
require_once __DIR__ . '/functions/templates.php';

if (empty($_COOKIE['productIDs'])) {

    header('Location: /git-repos/php-basic-hometasks/task_24/index.php');

    exit();
}

$productIDS = json_decode($_COOKIE['productIDs'], true);

$ids = json_decode($_COOKIE['productIDs'], true);
$uniqueIDs = array_unique($ids);

$i = 0;

foreach ($uniqueIDs as $uniqueID) {

    $productCount[$i] = 0;

    foreach ($ids as $id) {

        if ($id === $uniqueID) {
            ++$productCount[$i];
        }

    }

    $products[] = get_product($uniqueID);
    ++$i;

}

$i = 0;

$productCountSum = 0;
$priceSum = 0;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php echo get_template_contents(__DIR__ . '/templates/header.php', [
    'productIDS' => $productIDS
]); ?>

<main>

    <div class="container">

        <table class="table">

            <thead>

            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Count</th>
                <th scope="col">Total Price</th>
            </tr>

            </thead>

            <tbody>

            <?php foreach ($products as $product): ?>

                <?php
                echo get_template_contents(
                    __DIR__ . '/templates/checkout-table-row.php',
                    [
                        'i' => $i,
                        'name' => $product['name'],
                        'price' => $product['price'],
                        'count' => $productCount[$i]
                    ]
                );
                ?>

                <?php

                $productCountSum += $productCount[$i];
                $priceSum += round($product['price'] * $productCount[$i], 2);

                $_SESSION['products'][] = [
                    'name' => $product['name'],
                    'count' => $productCount[$i]
                ];

                ++$i;

                ?>

            <?php endforeach;; ?>

            <tr>
                <th scope="row">-</th>
                <td>Total:</td>
                <td>-</td>
                <td>
                    <?php
                    echo $productCountSum;
                    ?>
                </td>
                <td>
                    <?php
                    echo number_format($priceSum, 2);
                    ?>
                </td>
            </tr>

            </tbody>

            <?php

            $_SESSION['sum'] = $priceSum;

            ?>

        </table>

        <div class="row justify-content-between">

            <div class="col col-lg-2 my-4">

                <a href="controllers/clean-cart-controller.php" class="btn btn-lg btn-primary d-block w-100">
                    Clean Cart
                </a>

            </div>

            <div class="col col-lg-2 my-4">

                <a href="checkout-form.php" class="btn btn-lg btn-secondary d-block w-100">
                    Next &#8594
                </a>

            </div>

        </div>

    </div>

</main>

</body>
</html>

