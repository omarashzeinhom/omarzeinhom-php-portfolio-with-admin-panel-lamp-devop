<?php
$page__title = 'Edit Prdouct 📝';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');

$query = "SELECT * FROM products";
$posts = mysqli_query($connect__db, $query);
//$queryc = "SELECT * FROM categories";
//$categories = mysqli_query($connect__db, $queryc);

$img__query = "UPDATE product img";

?>

<h1><?php echo $page__title; ?></h1>


<?php
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $product = mysqli_fetch_assoc($result);
} else {
    header('location:' . ADMIN_URL . 'manage_posts.php');
    die("");
}; ?>


<section style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_post-logic.php" method="POST"
        enctype="multipart/form-data">

        <!--- While Loop For Category End  --->

        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $product['id'] ?>" name="id" placeholder="First Name" class="app__input">
        </div>
        <!-- Title  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="name">Product Name</label>
            <input name="name" class="app__input" type="text" id="firstName" value="<?= $product['name'] ?>"
                placeholder="Enter Post Title here..." />
        </div>
        <!-- Product Description Start  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Body</label>
            <textarea name="body" class="app__input" style="resize:none; " rows="8"
                value="<?= $product['description'] ?>" placeholder="test">
                <?= $product['description'] ?>
                </textarea>
        </div>
        <!-- Product Description End   --->
        <!-- Product Image Start  --->

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="price">Price</label>
            <input name="price" class="app__input" type="number" value="<?= $product['price'] ?>" />
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="retailprice">Retail Price</label>
            <input name="retailprice" class="app__input" type="number" value="<?= $product['retailprice'] ?>" />
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="quantity">Quantity</label>
            <input name="quantity" class="app__input" type="number" value="<?= $product['quantity'] ?>" />
        </div>


        <small>TODO: Edit Thumbnmail For Post</small>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Thumbnail</label>

        </div>
        <!-- Prodict Image End --->
        <!-- Product Featured Start  --->


        <!-- Product Featured End  --->
        <button name="submit__editproduct" type="submit" class="btn">Update Post</button>
    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>