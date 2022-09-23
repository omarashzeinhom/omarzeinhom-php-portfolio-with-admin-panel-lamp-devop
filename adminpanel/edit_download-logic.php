<?php
require('./config/database.php');


if (isset($_POST['submit__editdownload'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $download_title = filter_var($_POST['download_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_link = filter_var($_POST['download_link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_alt_title = filter_var($_POST['download_alt_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $download_alt_link = filter_var($_POST['download_alt_link'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$download_title || !$download_link || $download_alt_title  ||  $download_alt_link) {
        $_SESSION['edit-download'] = "Invalid Form Input on edit page.";
    } else {
        // UPDATE THE USER
        $query = "UPDATE downloads SET download_title='$download_title', download_link ='$download_link', download_alt_title='$download_alt_title', download_alt_link ='$download_alt_link' WHERE id=$id LIMIT 1";
        //DOUBLE CHECK 
        $result = mysqli_query($connect__db, $query);

        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-download'] = "Updating Download failed, please try again";
        } else {
            $_SESSION['edit-download-success'] = "$download_title Was updated successfully !";
        }
    }
}

header('location:' . ADMIN_URL . 'manage_downloads.php');
die();