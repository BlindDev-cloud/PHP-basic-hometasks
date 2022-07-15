<?php

require_once __DIR__ . '/functions/products.php';
require_once __DIR__ . '/functions/templates.php';

$page = (int)($_GET['page'] ?? 1);
$productsPerPage = 3;
$offset = ($page - 1) * $productsPerPage;

$products = get_all_products($offset, $productsPerPage);

$productsCount = count_products();
$maxPage = ceil($productsCount / $productsPerPage);

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

        <div class="row">

            <?php foreach ($products as $product): ?>

                <?php echo get_template_contents(__DIR__ . '/templates/product-tile.php', [
                    'id' => $product['id'],
                    'image' => $product['image'],
                    'name' => $product['name'],
                    'price' => $product['price']
                ]); ?>

            <?php endforeach; ?>

        </div>

    </div>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col col-lg-4">

                <nav aria-label="Pages">

                    <ul class="pagination">

                        <?php for ($i = 1; $i <= $maxPage; ++$i): ?>

                            <li class="page-item">

                                <a href="?page=<?php echo $i; ?>" class="page-link">
                                    <?php echo $i; ?>
                                </a>

                            </li>

                        <?php endfor; ?>

                    </ul>

                </nav>

            </div>

        </div>

    </div>


</main>

</body>
</html>