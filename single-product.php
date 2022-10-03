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
    <form action="./cart-logic.php" method="POST">

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
            <!--Add Quantity to Cart -->
            <!--Add Product ID to Cart -->
            <input name="id" value="<?= $product['id']; ?>" type="hidden" />
            <!--Add Quantity of Product to Cart -->
            <label> Quantity Available :</label>
            <input type="number" value="<?php $user_selected_quantity = (int)readline('Enter Quantity Here') ?>" name="quantity" min="1" maxlength="10" max="<?= $product['quantity']; ?>" 
                 />
                <small>Units Available:<em><?= $product['quantity']; ?></em></small>
            <button class="btn__sm" name="add_cart" >
                <a href="<?= HOME_URL?>cart.php?id=<?= $product['id'];?>.&quantity-<?php echo $user_selected_quantity ;?>">
                Add New Product to Cart
                </a>
            </button>
        </form>
        <!--Add Product to Cart -->


    </div>        <!-- CARD END -->

</div>



<?php
include('./partials/footer/footer.php');
?>