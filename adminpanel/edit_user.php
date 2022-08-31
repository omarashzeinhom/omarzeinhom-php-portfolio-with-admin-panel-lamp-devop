<?php
$page__title = 'Edit User👥';
include('./partials/header/header.php');
include('./partials/sidenav/sidenav.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location:' . ADMIN_URL . 'manage_users.php');
    die();
}






?>

<h1><?php echo $page__title; ?></h1>

<?php
if (isset($_SESSION['edit-user'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['edit-user'];
            unset($_SESSION['edit-user']); ?>
        </p>

    </div>
    <!--- DEBUG ERROR MSG IN SESSION  END  --->
<?php elseif (isset($_SESSION['edit-user-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['edit-user-success'];
            unset($_SESSION['edit-user-success']); ?>
        </p>

    </div>
<?php endif; ?>


<section>
    <form class="app__form-section" action="<?= HOME_URL ?>edit_user-logic.php" method="POST" enctype="multipart/form-data">

        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $user['id'] ?>" name="id" placeholder="First Name" class="app__adduser-input">
        </div>


        <div class="app__inputs-wrap">
            <label class="app__inputs-label">First Name</label>
            <input value="<?= $user['firstname'] ?>" name="firstname" type="text" placeholder="First Name" class="app__adduser-input">
        </div>

        <div class="app__inputs-wrap">
            <label class="app__inputs-label">Last Name</label>
            <input value="<?= $user['lastname'] ?>" name="lastname" type="text" placeholder="Last Name" class="app__adduser-input">
        </div>

        <select class="app__adduser-input" name="selectrole__edituser">
            <option value="0">Author</option>
            <option value="1">Admin</option>
        </select>
        <button name="submit__edituser" type="submit" class="btn">Update User</button>
    </form>
</section>








<?php

include('./partials/footer/footer.php');
?>