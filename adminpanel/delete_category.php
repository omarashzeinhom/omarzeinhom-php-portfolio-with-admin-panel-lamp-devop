<?php
$page__title = 'Deleted Category✨';
require './config/database.php';

if (isset($_GET['id'])) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    //UPDATE CATEGORY ID OF POSTS THAT BELONG TO CATEGORY ID OF UNCATEGORIZED CATEGORIES
    //TODO FOR LATER
    // AFTER HAVING POSTS TABLE 
    $update_query = "UPDATE posts SET category_id=5 WHERE category_id=$id ";
    $update_result = mysqli_query($connect__db, $update_query);


    if (!mysqli_errno($connect__db)) {
        //DELTE CATEGORY
        $delcategory_query = "DELETE FROM categories WHERE id=$id LIMIT 1";
        $results = mysqli_query($connect__db, $query);
        $_SESSION['delete-category-success'] = "Category was deleted succesfully";
    }
}
header('location:' . HOME_URL . 'manage_categories.php');
die();



?>


<h1><?php echo $page__title; ?></h1>





<?php

include('./partials/footer/footer.php');
?>