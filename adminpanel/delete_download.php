<?php
require('./config/database.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // FETCH USER
    $query = "SELECT * FROM downloads WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $download = mysqli_fetch_assoc($result);
    // var_dump($download);

    $delete__download__query = "DELETE FROM downloads WHERE id=$id";
    $delete__download__result = mysqli_query($connect__db, $delete__download__query);
    if (mysqli_errno($connect__db)) {
        $_SESSION['delete-download'] = "'{$download['download_title']}' '{$download['download_link']}'  '{$download['download_alt_title']}' '{$download['download_alt_link']}' Was Not Deleted! Please Try Again";
    } else {
        $_SESSION['delete-download-success'] = "'{$download['download_title']}' '{$download['download_link']}'  '{$download['download_alt_title']}' '{$download['download_alt_link']}' Was Deleted Successfully";
    }
}
header('location:' . ADMIN_URL . 'manage_downloads.php');
die();

?>


<?php
if (isset($_SESSION['delete-download'])) : ?>
<div class="app__alert-error">
    <p class="app__alert-p">
        <?= $_SESSION['delete-download'];
            unset($_SESSION['delete-download']); ?>
    </p>

</div>
<!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['delete-download-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= $_SESSION['delete-download-success'];
            unset($_SESSION['delete-download-success']); ?>
    </p>

</div>
<?php endif; ?>