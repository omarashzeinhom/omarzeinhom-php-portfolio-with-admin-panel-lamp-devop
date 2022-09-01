<?php
require('./config/database.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    // FETCH USER
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $user = mysqli_fetch_assoc($result);

    //DOUBLE CHECK FETCH ONLY 1 USER 

    if (mysqli_num_rows($result) == 1) {
        //var_dump($user);
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        //DEL The image if available
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }



    $delete__user__query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connect__db, $delete__user__query);
    if (mysqli_errno($connect__db)) {
        $_SESSION['delete-user'] = "'{$user['firstname']}' '{$user['lastname']}' Deletion was not successful ";
    } else {
        $_SESSION['delete-user-success'] = "'{$user['firstname']}' '{$user['lastname']}' Was Deleted Successfully";
    }

    //TODO CHECK ALL THUMBNAILS OF USER and DELETE Them 






}
header('location:' . ADMIN_URL . 'manage_users.php');
die();

?>


<?php
if (isset($_SESSION['delete-user'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['delete-user'];
            unset($_SESSION['delete-user']); ?>
        </p>

    </div>
    <!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['delete-user-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['delete-user-success'];
            unset($_SESSION['delete-user-success']); ?>
        </p>

    </div>
<?php endif; ?>