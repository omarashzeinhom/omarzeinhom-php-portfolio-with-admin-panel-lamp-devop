<?php
require './config/database.php';

//TODO Add PRODUCT LOGIC FIX
//GET user form if the submit__newuser button was clicked

if (isset($_POST['submit__newproduct'])) {
    //GET ALL THE VALUES IN THE POST SUPER GLOBAL
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $retailprice = filter_var($_POST['retailprice'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT);
    $img = $_FILES['img'];
    //DEBUG Inputs
    //var_dump($name, $description, $price, $retailprice, $quantity, $img);

    if (!$name) {
        $_SESSION['add-product'] = "Kindly ,Enter The Product  Title";
    } elseif (!$description) {
        $_SESSION['add-product'] = "Kindly ,Enter The Description for the product";
    } elseif (!$price) {
        $_SESSION['add-product'] = "Kindly ,Enter The Price for the product";
    } elseif (!$retailprice) {
        $_SESSION['add-product'] = "Kindly ,Enter The Retail Price for the product";
    } elseif (!$quantity) {
        $_SESSION['add-product'] = "Kindly ,Enter The Quantity for the product";
    } elseif (!$img['name']) {
        $_SESSION['add-product'] = "Kindly ,Upload A Thumbnail For Your Product";
    } else {
        //RENAME IMAGES TO NOT HAVE DUPLICATES
        $time = time(); //USED TO MAKE EACH IMAGE UNIQUE
        $img_newname = $time . $img['name'];
        //var_dump($thumbnail_newname);
        $img_tmp_name = $img['tmp_name'];
        $img_destination_path =  '../images/' . $img_newname;

        //CHECK IF FILE IS AN IMG 

        $allowed_images = ['png', 'jpg', 'jpeg', 'svg', 'webp', 'PNG'];
        $extension = explode('.', $img_newname);
        $extension = end($extension); // CHECK  AND COMPARE END OF ARRAY
        var_dump($extension);
        if (in_array($extension, $allowed_images)) {
            //CHECK : if image size is not too large (1mb+)
            if ($img['size'] < 5_00_000) /*avatar size is bigger than 500k bytes = 0.5 mb  */ {
                //UPLOAD AVATAR
                move_uploaded_file($img_tmp_name, $img_destination_path);
            } else {
                $_SESSION['add-product'] = 'File Size is too Big Please Use an Image converter to make the image below 0.5mb , since it differs in the websites performance ';
            }
        } else {
            $_SESSION['add-product'] = 'Files Accepted are jpeg, png, jpg , .svg and .webp';
        }
    };


    if (isset($_SESSION['add-product'])) {
        $_SESSION['product-data'] = $_POST;
        header("location:" . ADMIN_URL . "add_product.php");
        die();
    } else {
        //insert new posts into posts table 
        $insert_products_query = "INSERT INTO products SET name='$name', description='$description', price=$price, retailprice=$retailprice=', quantity=$quantity, img=$img_newname'";
        //passing mysqli_query using the insert_posts_query
        $insert_products_results = mysqli_query($connect__db, $insert_products_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-product-success'] = "Products Added Successfully ! please Login In";
            header('location:' . ADMIN_URL . 'manage_products.php');
            die();
        }
    };
}

//TODO Fix or Change LOGIC 