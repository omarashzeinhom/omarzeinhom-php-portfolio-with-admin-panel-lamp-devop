<?php

require './config/database.php';


if (isset($_POST['submit__newpost'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    //$is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-post'] = "Kindly ,Enter The Title For Post";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Kindly ,Enter The Body For Post";
    };


    if (isset($_SESSION['add-post'])) {
        header("location:" . ADMIN_URL . "add_post.php");
        die();
    } elseif (isset($_SESSION['add-post-success'])) {
        header("location:" . ADMIN_URL . "manage_posts.php");
        die();
    };
};