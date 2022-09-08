<?php
require('./config/database.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // FETCH USER
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $post = mysqli_fetch_assoc($result);

    //DOUBLE CHECK FETCH ONLY 1 USER 
    var_dump($post);

    if (mysqli_num_rows($result) == 1) {
        $thumbnail_name = $post['thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;
        //DEL The image if available
        if ($thumbnail_path) {
            unlink($thumbnail_path);
        }
    }



    $delete__post__query = "DELETE FROM posts WHERE id=$id";
    $delete__post__result = mysqli_query($connect__db, $delete__post__query);
    if (mysqli_errno($connect__db)) {
        $_SESSION['delete-post'] = "'{$post['title']}' '{$post['body']}' Deletion was not successful ";
    } else {
        $_SESSION['delete-post-success'] = "'{$post['title']}' '{$post['body']}' Was Deleted Successfully";
    }

    //TODO CHECK ALL THUMBNAILS OF USER and DELETE Them 






}
header('location:' . ADMIN_URL . 'manage_posts.php');
die();

?>


<?php
if (isset($_SESSION['delete-post'])) : ?>
<div class="app__alert-error">
    <p class="app__alert-p">
        <?= $_SESSION['delete-post'];
            unset($_SESSION['delete-post']); ?>
    </p>

</div>
<!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['delete-post-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= $_SESSION['delete-post-success'];
            unset($_SESSION['delete-post-success']); ?>
    </p>

</div>
<?php endif; ?>