<?php
include('./partials/header/header.php');

// fetch the current user from the db 

if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar from users WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $avatar = mysqli_fetch_assoc($result);
}

//CHECK : The login status 
if (!isset($_SESSION['user-id'])) {
    header('location:' . ROOT_URL . 'login.php');
}

?>

<div class="app__sidenav-closed">
    <li class='app__sidenav-item'><a href="<?= ADMIN_URL ?>dashboard.php" class="app__sidenav-itemLink"> 🏠</a></li>

    <li class='app__sidenav-item'><a href="<?= ADMIN_URL ?>manage_posts.php" class="app__sidenav-itemLink">📝</a>
    </li>

    <!-- Admin User Options Start -->

    <?php
    if (isset($_SESSION['user_is_admin'])) : ?>
        <li class='app__sidenav-item'><a href="<?= ADMIN_URL ?>manage_users.php" class="app__sidenav-itemLink">👥</a>

        <li class='app__sidenav-item'><a href="<?= ADMIN_URL  ?>manage_categories.php" class="app__sidenav-itemLink">✨</a>
        </li>
        <li class='app__sidenav-item'><a href="<?= ADMIN_URL  ?>manage_products.php" class="app__sidenav-itemLink">🛍️ </a>
        </li>

    <?php endif; ?>
    <!-- Admin User Options End -->




    <!--RESTRICT SIGN IN IF LOGGGED IN SESSION Start -->
    <?php if (isset($_SESSION['user-id'])) : ?>
        <li class='app__sidenav-item'>
            <a href="<?= ROOT_URL ?>logout.php" class="app__sidenav-itemLink"><small>
                    <i> Logout</i>
                </small>
                <img alt="avatar" class="app__admin__nav-avatar" loading="lazy" src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" />
            </a>

        </li>


        <!--Login end-->

    <?php else : ?>
        <!--Login start-->
        <li class='app__sidenav-item'><a href="<?= ROOT_URL ?>login.php" class="app__sidenav-itemLink">🚪</a>
        </li>


    <?php endif; ?>
    <!-- RESTRICT SIGN IN IF LOGGGED IN SESSION End-->

</div>