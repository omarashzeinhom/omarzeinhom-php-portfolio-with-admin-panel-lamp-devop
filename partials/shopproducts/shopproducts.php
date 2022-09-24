<?php
$products_query = "SELECT * FROM products";
$products_result = mysqli_query($connect__db, $products_query);
?>

<?php while ($product = mysqli_fetch_assoc($products_result)) : ?>
    <div class="app__col">
        <!-- Card Start --->
        <div class="app__card" id="appCardId">
            <div class="app__card-header">
                <h3> <?= $product['name']; ?>
                </h3>
                <h4> <?= $product['price']; ?>
                </h4>
                <h5> <?= $product['retailprice']; ?>
                </h5>

                <!--- Posts Title  -->
                <h6 class="" id="postsBody" maxlength="100">
                    <?= substr($product['description'], 0, 100)  . " ..."; ?>
                </h6>
            </div>

            <div class="app__card-footer">
                <!-- Card Footer Start --->

            </div><!-- Card Footer End--->
        </div><!-- Card End--->

        <!-- Btn Wrap  End--->
    </div> <!-- Column End--->
<?php endwhile; ?>