<?php
require './config/database.php';


//GET user form if the submit__newuser button was clicked

if (isset($_POST['submit__newuser'])) {
    //GET ALL THE VALUES IN THE POST SUPER GLOBAL
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $retailprice = filter_var($_POST['retailprice'], FILTER_VALIDATE_EMAIL);

    $image = $_FILES['image'];
    //user role 
    $is_admin = filter_var($_POST['user__role'], FILTER_SANITIZE_NUMBER_INT);


    //DEBUG Inputs
    //echo $firstname, $lastname, $username, $email, $password, $confirmpassword;
    //DEBUG Avatar Var
    // var_dump($avatar);

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
        if ($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = 'Passwors Entered do not match';
        } else {
            //hashed password
            $hashed_pass =  password_hash($createpassword, PASSWORD_DEFAULT);
            //echo $createpassword . '<br/>';
            //echo $hashed_pass;
            //check if username or the email already exists in the database
            $username_check_query = "SELECT * FROM users WHERE
            username = '$username' OR email='$email'";
            $username_check_results = mysqli_query($connect__db, $username_check_query);
            if (mysqli_num_rows($username_check_results) > 0) {
                $_SESSION['add-user'] = 'UserName or Email already exists';
            } else {
                // adduser avatar picture name to be unique
                $time = time();
                $avatar_new_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_new_name;

                //DEBUG 
                // if file is an image
                //allowed_images files 
                $allowed_images = ['png', 'jpg', 'jpeg', 'svg', 'webp'];
                $extension = explode('.', $avatar_new_name);
                $extension = end($extension);
                if (in_array($extension, $allowed_images)) {
                    //CHECK : if image size is not too large (500kb+)
                    if ($avatar['size'] < 500000) /*avatar size is less than 500k bytes = 0.5 mb  */ {
                        //UPLOAD AVATAR
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = 'File Size is too Big Please Use an Image converter to make the image below 0.5mb , since it differs in the websites performance ';
                    }
                } else {
                    $_SESSION['add-user'] = 'Files Accepted are jpeg, png, jpg , .svg and .webp';
                }
            }
        }
    }

    //DEBUG AVATAR Using var_dump();
    //var_dump($avatar);
    if (isset($_SESSION['add-user'])) {
        // passing the form data back to the add_user page
        //sends all invalid details to add_user page make sure its the session add-user-data
        $_SESSION['add-user-data'] = $_POST;
        header('location:' . ADMIN_URL . 'add_user.php');
        die();
    } else {
        //insert new user into users table 
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_pass', avatar='$avatar_new_name', is_admin=$is_admin ";
        //passing mysqli_query using the insert userquery
        $insert_user_results = mysqli_query($connect__db, $insert_user_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-user-success'] = "A new user $firstname $lastname has been added successfully";
            header('location:' . ADMIN_URL . 'manage_users.php');
            die();
        }
    }
} else {
    header('location:' . ADMIN_URL . 'add_user.php');
    die();
}