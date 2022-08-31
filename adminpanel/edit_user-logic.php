<?php
require('./config/database.php');

//TODO : DEBUG AND FIX EDIT USER NOT WORKING ON SUBMIT

if (isset($_POST['submit__edituser'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['selectrole__edituser'], FILTER_SANITIZE_NUMBER_INT);
    //CHECK THE VALID INPUTS
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Invalid Form Input on edit page.";
    } else {
        // UPDATE THE USER
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE id=$id LIMIT 1";
        //DOUBLE CHECK 
        $result = mysqli_query($connect__db, $query);

        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-user'] = "Updating user failed.";
        } else {
            $_SESSION['edit-user-success'] = "User $firstname $lastname was updated successfully !";
        }
    }
}

header('location:' . ADMIN_URL . 'manage_users.php');
die();
