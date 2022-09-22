<?php
require('./config/database.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // FETCH USER
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $product = mysqli_fetch_assoc($result);

    //DOUBLE CHECK FETCH ONLY 1 USER 
    var_dump($product);

    if (mysqli_num_rows($result) == 1) {
        $thumbnail_name = $product['img'];
        $thumbnail_path = '../images/' . $thumbnail_name;
        //DEL The image if available
        if ($thumbnail_path) {
            unlink($thumbnail_path);
        }
    }



    $delete__post__query = "DELETE FROM products WHERE id=$id";
    $delete__post__result = mysqli_query($connect__db, $delete__post__query);
    if (mysqli_errno($connect__db)) {
        $_SESSION['delete-product'] = "'{$product['name']}' '{$product['description']}' Deletion was not successful ";
    } else {
        $_SESSION['delete-product-success'] = "'{$$product['name']}' '{$product['description']}' Was Deleted Successfully";
    }

    //TODO CHECK ALL THUMBNAILS OF USER and DELETE Them 






}
header('location:' . ADMIN_URL . 'manage_products.php');
die();

?>


<?php
if (isset($_SESSION['delete-post'])) : ?>
<div class="app__alert-error">
    <p class="app__alert-p">
        <?= $_SESSION['delete-product'];
            unset($_SESSION['delete-product']); ?>
    </p>

</div>
<!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['delete-post-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= $_SESSION['delete-product-success'];
            unset($_SESSION['delete-product-success']); ?>
    </p>

</div>
<?php endif; ?>