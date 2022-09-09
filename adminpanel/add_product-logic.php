<?php
require './config/database.php';


//GET user form if the submit__newuser button was clicked

if (isset($_POST['submit__newuser'])) {
    //GET ALL THE VALUES IN THE POST SUPER GLOBAL
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $retailprice = filter_var($_POST['retailprice'], FILTER_VALIDATE_EMAIL);
    $quantity = filter_var($_POST['user__role'], FILTER_SANITIZE_NUMBER_INT);
    $image = $_FILES['image'];


    //DEBUG Inputs
    //echo $firstname, $lastname, $username, $email, $password, $confirmpassword;
    //DEBUG Avatar Var
    var_dump($image);

    //VALIDATING Input Values
    if (!$title) {
        $_SESSION['add-product'] = "Your Product Title is missing ⁉️";
    } elseif (!$description) {
        $_SESSION['add-product'] = "Your Description is missing ⁉️";
    } elseif (!$price) {
        $_SESSION['add-product'] = "Your Price is missing ⁉️";
    } elseif (!$retailprice) {
        $_SESSION['add-product'] = "Your Retail Price is missing ⁉️";
    } else {
        //check if confirm password matches the createdpassword


        //check if username or the email already exists in the database
        $product_check_query = "SELECT * FROM products WHERE
            title = '$title' OR description='$description'";
        $product_check_results = mysqli_query($connect__db, $product_check_query);
        if (mysqli_num_rows($product_check_results) > 0) {
            $_SESSION['add-product'] = 'Product already exists';
        } else {
            // adduser avatar picture name to be unique
            $time = time();
            $image_new_name = $time . $image['image'];
            $imagetmp_name = $product['tmp_name'];
            $image_destination_path = '../images/' . $image_new_name;

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
        $insert_user_query = "INSERT INTO products SET title='$title', description='$description', price=$price, retailprice=$retailprice, quantity=$quantity image='$image'";
        //passing mysqli_query using the insert userquery
        $insert_user_results = mysqli_query($connect__db, $insert_user_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-product-success'] = "A new product $title $lastname has been added successfully";
            header('location:' . ADMIN_URL . 'manage_products.php');
            die();
        }
    }
} else {
    header('location:' . ADMIN_URL . 'add_product.php');
    die();
}