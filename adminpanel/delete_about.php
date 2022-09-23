<?php
require('./config/database.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // FETCH USER
    $query = "SELECT * FROM abouts WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $about = mysqli_fetch_assoc($result);

    //DOUBLE CHECK FETCH ONLY 1 about
    var_dump($about);

    if (mysqli_num_rows($result) == 1) {
        $thumbnail_name = $about['about_thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;
        //DEL The image if available
        if ($thumbnail_path) {
            unlink($thumbnail_path);
        }
    }



    $delete__about__query = "DELETE FROM abouts WHERE id=$id";
    $delete__about__result = mysqli_query($connect__db, $delete__about__query);
    if (mysqli_errno($connect__db)) {
        $_SESSION['delete-about'] = "'{$about['about_title']}' '{$about['about_body']}' Deletion was not successful ";
    } else {
        $_SESSION['delete-about-success'] = "'{$about['about_title']}' '{$post['about_body']}' Was Deleted Successfully";
    }

    //TODO CHECK ALL THUMBNAILS OF USER and DELETE Them 






}
header('location:' . ADMIN_URL . 'manage_abouts.php');
die();

?>


<?php
if (isset($_SESSION['delete-about'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['delete-about'];
            unset($_SESSION['delete-about']); ?>
        </p>

    </div>
    <!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['delete-about-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['delete-about-success'];
            unset($_SESSION['delete-about-success']); ?>
        </p>

    </div>
<?php endif; ?>