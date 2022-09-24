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
        <h2> <?= $product['retailprice'] . "$"; ?>
        </h2>
        <h3> Quantity Available :</h3>
        <select>
            <option> <?= $product['quantity']; ?>
            </option>
        </select>

    </div>

    <button class="app__btn">
        <a href="cart.php?id=<?= $product['id'] ?>">
            Add To Cart
        </a>

    </button>

</div>



<?php
include('./partials/footer/footer.php');
?>