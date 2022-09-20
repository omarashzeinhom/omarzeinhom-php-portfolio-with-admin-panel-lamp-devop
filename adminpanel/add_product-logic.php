<?php
require './config/database.php';


//GET user form if the submit__newuser button was clicked

if (isset($_POST['submit__newproduct'])) {
    //GET ALL THE VALUES IN THE POST SUPER GLOBAL
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
    $retailprice = filter_var($_POST['retailprice'], FILTER_SANITIZE_NUMBER_FLOAT);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_FLOAT);
    $img = $_FILES['img'];
    var_dump($title);

    //DEBUG Inputs
    //echo $firstname, $lastname, $username, $email, $password, $confirmpassword;
    //DEBUG Avatar Var
    var_dump($image);

    //VALIDATING Input Values
    if (!$name) {
        $_SESSION['add-product'] = "Your Product Title is missing ⁉️";
    } elseif (!$description) {
        $_SESSION['add-product'] = "Your Description is missing ⁉️";
    } elseif (!$price) {
        $_SESSION['add-product'] = "Your Price is missing ⁉️";
    } elseif (!$retailprice) {
        $_SESSION['add-product'] = "Your Retail Price is missing ⁉️";
    } elseif (!$name || !$description || !$price || !$retailprice) {
        $_SESSION['add-product'] = "Your Product info is missing please add it in again ⁉️";
    }

    $product_check_query = "SELECT * FROM products WHERE
            name= '$name' OR description='$description'";
    $product_check_results = mysqli_query($connect__db, $product_check_query);
    if (mysqli_num_rows($product_check_results) > 0) {
        $_SESSION['add-product'] = 'Product already exists';
    } else {
        // adduser avatar picture name to be unique
        $time = time();
        $img_new_name = $time . $img['img'];
        $imgtmp_name = $product['tmp_name'];
        $img_destination_path = '../images/' . $img_new_name;

        //DEBUG 
        // if file is an image
        //allowed_images files 
        $allowed_images = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
        $extension = explode('.', $product_new_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_images)) {
            //CHECK : if image size is not too large (500kb+)
            if ($product['size'] < 500000) /*avatar size is less than 500k bytes = 0.5 mb  */ {
                //UPLOAD AVATAR
                move_uploaded_file($product_tmp_name, $product_destination_path);
            } else {
                $_SESSION['add-product'] = 'File Size is too Big Please Use an Image converter to make the image below 0.5mb , since it differs in the websites performance ';
            }
        } else {
            $_SESSION['add-product'] = 'Files Accepted are jpeg, png, jpg , .svg and .webp';
        }
    }



    //DEBUG AVATAR Using var_dump();
    //var_dump($avatar);
    if (isset($_SESSION['add-product'])) {
        // passing the form data back to the add_user page
        //sends all invalid details to add_user page make sure its the session add-user-data
        $_SESSION['add-product'] = $_POST;
        header('location:' . ADMIN_URL . 'add_product.php');
        die();
    } else {
        //insert new user into users table 
        $insert_user_query = "INSERT INTO products SET name='$name', description='$description', price=$price, retailprice=$retailprice, quantity=$quantity image='$image'";
        //passing mysqli_query using the insert userquery
        $insert_user_results = mysqli_query($connect__db, $insert_user_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-product-success'] = "A new product $name $lastname has been added successfully";
            header('location:' . ADMIN_URL . 'manage_products.php');
            die();
        }
    }
} else {
    header('location:' . ADMIN_URL . 'manage_products.php');

    die();
}

//TODO Fix or Change LOGIC 