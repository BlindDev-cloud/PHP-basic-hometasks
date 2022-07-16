
<header>

    <div class="container">

        <div class="row">

            <div class="col w-100 text-center mt-4">

                <h1>Welcome administrator!</h1>

            </div>

        </div>

        <div class="row">

            <div class="col w-100 my-2">

                <ul class="nav justify-content-center">

                    <li class="nav-item">

                        <a href="index.php" class="nav-link">Home</a>

                    </li>

                    <li class="nav-item">

                        <a href="add-product-form.php" class="nav-link">Add product</a>

                    </li>

                    <?php if(!empty($_productIDS)): ?>

                        <li class="nav-item">

                            <a href="checkout.php" class="nav-link">
                                Cart <?php echo count($_productIDS); ?>
                            </a>

                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>

    </div>

</header>