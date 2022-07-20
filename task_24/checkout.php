<?php

require_once __DIR__ . '/functions/products.php';
require_once __DIR__ . '/functions/templates.php';
require_once __DIR__ . '/functions/cookie.php';
require_once __DIR__ . '/functions/checkout.php';

$productIDs = get_cookie_content('productIDs');

if (empty($productIDs)) {

    header('Location: /git-repos/php-basic-hometasks/task_24/index.php');

    exit();
}

$products = get_list_of_products($productIDs);

$i = 0;

$totalCount = 0;
$totalSum = 0;

print_r($products);

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
    'productIDs' => $productIDs
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
                        'count' => $product['count']
                    ]
                );

                $totalCount += $product['count'];
                $totalSum += round($product['price'] * $product['count'], 2);
                ++$i;

                ?>

            <?php endforeach;; ?>

            <tr>
                <th scope="row">-</th>
                <td>Total:</td>
                <td>-</td>
                <td>
                    <?php
                    echo $totalCount;
                    ?>
                </td>
                <td>
                    <?php
                    echo number_format($totalSum, 2);
                    ?>
                </td>
            </tr>

            </tbody>

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

