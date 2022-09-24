<?php
//Assign Page title here
$page__title = 'Add to Cart ';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
?>

<h1><?php echo "$page__title" ?> </h1>


<?php

if (isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $retailprice = filter_var($_POST['retailprice'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $img = $_FILES['img'];
    $product_id = $_POST['id'];
}

?>