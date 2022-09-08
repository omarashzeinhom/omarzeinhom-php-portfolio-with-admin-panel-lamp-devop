<?php
require('./config/database.php');


if (isset($_POST['submit__editpost'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_featured = filter_var($_POST['selectrole__edituser'], FILTER_SANITIZE_NUMBER_INT);
    //CHECK THE VALID INPUTS
    if (!$title || !$body) {
        $_SESSION['edit-post'] = "Invalid Form Input on edit page.";
    } else {
        // UPDATE THE USER
        $query = "UPDATE posts SET title='$title', body='$body', is_featured=$is_featured WHERE id=$id LIMIT 1";
        //DOUBLE CHECK 
        $result = mysqli_query($connect__db, $query);

        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-post'] = "Updating post failed, please try again";
        } else {
            $_SESSION['edit-post-success'] = "User $firstname $lastname was updated successfully !";
        }
    }
}

header('location:' . ADMIN_URL . 'manage_posts.php');
die();