<?php
include('./partials/header/header.php');
include('./partials/nav/nav.php');


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $product = mysqli_fetch_assoc($result);

} else {
    header('location:' . HOME_URL . 'shop.php');
    die();
}
$page__title = $product['name'];
?>

<div class="app__card-lg">
    <h1><?php echo $page__title; ?></h1>
    <img class="app__card-img" src="<?= 'images/' . $product['img']; ?>" alt="<?= $product['name']; ?>"
        loading="lazy" />
    <p style="font-size:medium;">
        Description:
        <?= $product['description']; ?>
    </p>
    <div class="app__card-footer">
        <h2>
            <?php if ($product['retailprice'] > 0) : ?>
            <?= $product['retailprice'] . "$"; ?>
            <?php endif; ?>
        </h2>
        <!--Add Product to Cart -->
        <form action="cart.php" method="POST">
            <!--Add Quantity to Cart -->
            <!--Add Product ID to Cart -->
            <input name="id" value="<?= $product['id']; ?>" type="hidden" />
            <!--Add Quantity of Product to Cart -->
            <label> Quantity Available :</label>
            <?php $q="1" || $q="2" ?>
            <input name="quantity" value="<?php echo $q;?>" min="1" max="<?= $product['quantity']; ?>" type="number"
                placeholder="Quantity" />
            <button class="app__btn" name="submit__add__product__to__cart" >
                <a href="<?= HOME_URL?>cart.php?id=<?= $product['id']?>?q=<?php echo $q;?>">
                Add New Product to Cart
            <?php $_SESSION['cart']?>
                </a>
            </button>
        </form>
        <!--Add Product to Cart -->


    </div>        <!-- CARD END -->

</div>



<?php
include('./partials/footer/footer.php');
?>