<?php

require './config/database.php';


if (isset($_POST['submit__newabout'])) {
    $about_title = filter_var($_POST['about_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_body = filter_var($_POST['about_body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_thumbnail = $_FILES['about_thumbnail'];

    if (!$about_title) {
        $_SESSION['add-about'] = "Kindly ,Enter The About Title";
    } elseif (!$about_body) {
        $_SESSION['add-about'] = "Kindly ,Enter The Body For the About";
    } elseif (!$about_thumbnail['name']) {
        $_SESSION['add-post'] = "Kindly ,Upload A Thumbnail For Your About Card";
    } else {
        //RENAME IMAGES TO NOT HAVE DUPLICATES
        $time = time(); //USED TO MAKE EACH IMAGE UNIQUE
        $thumbnail_newname = $time . $about_thumbnail['name'];
        //var_dump($thumbnail_newname);
        $thumbnail_tmp_name = $about_thumbnail['tmp_name'];
        $thumbnail__destination_path =  '../images/' . $thumbnail_newname;

        //CHECK IF FILE IS AN IMG 

        $allowed_thumbnails = ['png', 'jpg', 'jpeg', 'svg', 'webp', 'PNG'];
        $extension = explode('.', $thumbnail_newname);
        $extension = end($extension); // CHECK  AND COMPARE END OF ARRAY
        var_dump($extension);
        if (in_array($extension, $allowed_thumbnails)) {
            //CHECK : if image size is not too large (1mb+)
            if ($thumbnail['size'] < 5_00_000) /*avatar size is bigger than 500k bytes = 0.5 mb  */ {
                //UPLOAD AVATAR
                move_uploaded_file($thumbnail_tmp_name, $thumbnail__destination_path);
            } else {
                $_SESSION['add-about'] = 'File Size is too Big Please Use an Image converter to make the image below 0.5mb , since it differs in the websites performance ';
            }
        } else {
            $_SESSION['add-about'] = 'Files Accepted are jpeg, png, jpg , .svg and .webp';
        }
    };


    if (isset($_SESSION['add-about'])) {
        $_SESSION['about-data'] = $_POST;
        header("location:" . ADMIN_URL . "add_about.php");
        die();
    } else {

        //insert new posts into posts table 
        $insert_abouts_query = "INSERT INTO abouts SET about_title='$about_title', about_body='$about_body', about_thumbnail='$thumbnail_newname'";
        //passing mysqli_query using the insert_posts_query
        $insert_abouts_results = mysqli_query($connect__db, $insert_abouts_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-about-success'] = "About Added Successfully ! View It In the About Page";
            header('location:' . ADMIN_URL . 'manage_abouts.php');
            die();
        }
    };
} else {
    header("location:" . ADMIN_URL . "add_about.php");
    die();
};