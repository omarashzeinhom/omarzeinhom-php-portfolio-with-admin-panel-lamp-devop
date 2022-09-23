<?php
require('./config/database.php');


if (isset($_POST['submit__editabout'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $about_title = filter_var($_POST['about_title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $about_body = filter_var($_POST['about_body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //CHECK THE VALID INPUTS
    if (!$about_title || !$about_body) {
        $_SESSION['edit-about'] = "Invalid Form Input on edit page.";
    } else {
        // UPDATE THE USER
        $query = "UPDATE abouts SET about_title='$about_title', about_body='$about_body' WHERE id=$id LIMIT 1";
        //DOUBLE CHECK 
        $result = mysqli_query($connect__db, $query);

        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-about'] = "Updating about failed, please try again";
        } else {
            $_SESSION['edit-about-success'] = "$about_title Was updated successfully !";
        }
    }
} else {
    header('location:' . ADMIN_URL . 'manage_abouts.php');
    die();
}
header('location:' . ADMIN_URL . 'manage_abouts.php');
die();