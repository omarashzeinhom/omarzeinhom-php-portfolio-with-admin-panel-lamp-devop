<?php

require './config/database.php';


if (isset($_POST['submit__newpost'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);


    //SET is_featured to 0 if unchecked 
    $is_featured = $is_featured == 1 ?: 0;

    if (!$title) {
        $_SESSION['add-post'] = "Kindly ,Enter The Post Title";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Kindly ,Enter The Body For Post";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Kindly ,Upload A Thumbnail For Your Post";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Kindly ,Select the Category For Post";
    } else {
        //RENAME IMAGES TO NOT HAVE DUPLICATES
        $time = time(); //USED TO MAKE EACH IMAGE UNIQUE
        $thumbnail_newname = $time . $thumbnail['name'];
        //var_dump($thumbnail_newname);
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
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
                $_SESSION['add-post'] = 'File Size is too Big Please Use an Image converter to make the image below 0.5mb , since it differs in the websites performance ';
            }
        } else {
            $_SESSION['add-post'] = 'Files Accepted are jpeg, png, jpg , .svg and .webp';
        }
    };


    if (isset($_SESSION['add-post'])) {
        $_SESSION['post-data'] = $_POST;
        header("location:" . ADMIN_URL . "add_post.php");
        die();
    } else {
        if ($is_featured == 1) {
            $zero__all__is__featured__query = "UPDATE posts SET is_featured=0";
            $zero__all__is__featured__result = mysqli_query($connect__db, $zero__all__is__featured__query);
        }
        //insert new posts into posts table 
        $insert_posts_query = "INSERT INTO posts SET title='$title', body='$body', thumbnail='$thumbnail_newname', category_id=$category_id, author_id=$author_id, is_featured=$is_featured";
        //passing mysqli_query using the insert_posts_query
        $insert_post_results = mysqli_query($connect__db, $insert_posts_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-post-success'] = "Post Added Successfully ! please Login In";
            header('location:' . ADMIN_URL . 'manage_posts.php');
            die();
        }
    };
} else {
    header("location:" . ADMIN_URL . "add_post.php");
    die();
};
