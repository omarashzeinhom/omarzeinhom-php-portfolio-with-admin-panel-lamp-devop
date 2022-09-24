<?php
include('./partials/header/header.php');
include('./partials/nav/nav.php');


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $product = mysqli_fetch_assoc($result);
} else {
    //header('location:' . HOME_URL . 'home.php');
    die();
}
$page__title = $product['name'];
?>
<div class="app__card-lg">
    <h1><?php echo $page__title; ?></h1>
    <img class="app__card-img" src="<?= 'images/' . $product['img']; ?>" alt="<?= $product['name']; ?>"
        loading="lazy" />
    <p style="font-size:medium;">
        <?= $product['description']; ?>
    </p>


</div>



<?php
include('./partials/footer/footer.php');
?>