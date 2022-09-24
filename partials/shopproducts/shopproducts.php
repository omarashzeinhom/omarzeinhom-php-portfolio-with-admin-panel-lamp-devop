<?php
$products_query = "SELECT * FROM products";
$products_result = mysqli_query($connect__db, $products_query);
?>

<?php while ($product = mysqli_fetch_assoc($products_result)) : ?>
<div class="app__col">
    <!-- Card Start --->
    <div class="app__card" id="appCardId">
        <div class="app__card-header">
            <div class="app__card-img-shadow">
                <a href="<?= HOME_URL ?>single-product.php?id=<?= $product['id'] ?>">
                    <img src="<?= 'images/' . $product['img'] ?>" class="app__card-img" class="app__thumbnail-avatar"
                        width="50px" height="50px" alt="<?= $product['name']; ?>" />
                </a>
            </div>

            <h3> <?= $product['name']; ?>
            </h3>
            <!--- Posts Title  -->
            <h6 class="" id="postsBody" maxlength="100">
                <?= substr($product['description'], 0, 100)  . " ..."; ?>
            </h6>
        </div>

        <div class="app__card-footer">
            <!-- Card Footer Start --->


            <h4> <?= $product['price']; ?>
            </h4>
            <h5> <?= $product['retailprice']; ?>
            </h5>
        </div><!-- Card Footer End--->


    </div><!-- Card End--->

    <!-- Btn Wrap  End--->
</div> <!-- Column End--->
<?php endwhile; ?>