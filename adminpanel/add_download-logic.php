<?php

require './config/database.php';


if (isset($_POST['submit__newdownload'])) {
    $download_title = filter_var($_POST['download_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_link = filter_var($_POST['download_link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_alt_title = filter_var($_POST['download_alt_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_alt_link = filter_var($_POST['download_alt_link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$download_title) {
        $_SESSION['add-about'] = "Kindly ,Enter The Download Title";
    } elseif (!$download_link) {
        $_SESSION['add-about'] = "Kindly ,Enter The Download Link";
    } elseif (!$download_alt_title) {
        $_SESSION['add-about'] = "Kindly ,Enter The Download Alt Title";
    } elseif (!$download_alt_link) {
        $_SESSION['add-about'] = "Kindly ,Enter The Download Alt Link";
    }


    if (isset($_SESSION['add-download'])) {
        $_SESSION['download-data'] = $_POST;
        header("location:" . ADMIN_URL . "add_download.php");
        die();
    } else {

        //insert new posts into posts table 
        $insert_downloads_query = "INSERT INTO downloads SET download_title='$download_title', download_link='$download_link', download_alt_title='$download_alt_title', download_alt_link='$download_alt_link'";
        //passing mysqli_query using the insert_posts_query
        $insert_downloads_results = mysqli_query($connect__db, $insert_downloads_query);
        if (!mysqli_errno($connect__db)) {
            //redirecting to login page
            $_SESSION['add-download-success'] = "Download Added Successfully ! View It In the About Page";
            header('location:' . ADMIN_URL . 'manage_downloads.php');
            die();
        }
    };
} else {
    header("location:" . ADMIN_URL . "add_download.php");
    die();
};
