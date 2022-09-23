<?php
require('./config/database.php');


if (isset($_POST['submit__editproduct'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $retailprice = filter_var($_POST['retailprice'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT);
    //$img = $_FILES['img'];

    //CHECK THE VALID INPUTS
    if (!$name  || !$description || !$price || !$retailprice || !$quantity) {
        $_SESSION['edit-product'] = "Invalid Form Input on edit page.";
    } else {
        // UPDATE THE USER
        $query = "UPDATE products SET name = '$name', description = '$description', price = $price, retailprice = $retailprice, quantity = $quantity WHERE id=$id LIMIT 1;";
        //DOUBLE CHECK 
        $result = mysqli_query($connect__db, $query);

        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-product'] = "Updating post failed, please try again";
        } else {
            $_SESSION['edit-product-success'] = "User $firstname $lastname was updated successfully !";
        }
    }
}

header('location:' . ADMIN_URL . 'manage_products.php');
die();