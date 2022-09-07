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
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail__destination_path = '../images' . $thumbnail_newname;

        //CHECK IF FILE IS AN IMG 

        $allowed_thumbnails = ['png', 'jpg', 'jpeg', 'svg', 'webp', 'PNG'];
        $extension = explode('.', $thumbnail_newname);
        $extension = end($extension);
    };


    if (isset($_SESSION['add-post'])) {
        header("location:" . ADMIN_URL . "add_post.php");
        die();
    } elseif (isset($_SESSION['add-post-success'])) {
        header("location:" . ADMIN_URL . "manage_posts.php");
        die();
    };
};