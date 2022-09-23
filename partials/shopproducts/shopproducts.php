<?php
$products_query = "SELECT * FROM products ";
$products_result =  mysqli_query($connect__db, $products_query);

?>


<?php while ($product = mysqli_fetch_assoc($products_result)) : ?>
    <?php

    ?>
    <div class="app__col">
        <!-- Card Start --->
        <div class="app__card" id="appCardId">
            <div class="app__card-header">
                <div class="app__card-img-shadow">
                    <a href="<?= ROOT_URL ?>single-product.php?id=<?= $product['id'] ?>">

                    </a>
                </div>
                <h5 id="postsTitle"> <a href="<?= ROOT_URL ?>single-product.php?id=<?= $product['id'] ?>">
                        <?= $product['name']; ?>
                    </a>
                </h5>
                <!--- Posts Title  -->

                <h6 class="app__td" id="postsBody" maxlength="100">
                    <?= substr($product['description'], 0, 100)  . " ..."; ?>
                </h6>
            </div>
            <?= $product['price']; ?>
            <?= $product['retailprice']; ?>

            <div class="app__card-footer">
                <!-- Card Footer Start --->
            </div><!-- Card Footer End--->
        </div><!-- Card End--->



    </div>
    </div>
    <!-- Btn Wrap  End--->
    </div> <!-- Column End--->
<?php endwhile; ?>