<?php
require('./config/database.php');
//AssignCategory Logic  
if (isset($_POST['submit__adduser'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$title) {
        $_SESSION['add-category'] = "Enter Title";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Enter Description";
    };


    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_SESSION['add-category'];
        header('location:' . ADMIN_URL . 'add_category.php');
        die();
    } else {
        //insert category into database 
        $query = "INSERT INTO categories (title, description) VALUES ('$title ','$description')";
        $result = mysqli_query($connect__db, $query);
        if (mysqli_errno($connect__db)) {
            $_SESSION['add-category'] = "Category wasnt added successfully";
            header('location:' . ADMIN_URL . 'add_category');
            die();
        } else {
            $_SESSION['add-category-success'] = "Category '$title' was added Succesfully!!";
            header('location:' . ADMIN_URL . 'manage_categories.php');
            die();
        }
    };
};
