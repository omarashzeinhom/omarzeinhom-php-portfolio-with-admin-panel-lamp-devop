<?php
require 'config/database.php';

if (isset($_POST['submit__editcategory'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //VALIDATE INPUTS

    if (!$title) {
        $_SESSION['edit-category'] = "Invalid form input on edit category page";
    } else {
        $query = "UPDATE categories SET title='$title' description='$description' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connect__db, $query);
        if (mysqli_errno($connect__db)) {
            $_SESSION['edit-category'] = "Updating Category wasnt succssful";
        } else {
            $_SESSION['edit-category-success'] = "Category has been updated successfully";
        }
        header('location:' . HOME_URL . 'manage_categories.php');
        die();
    }
}
