<?php
include('./partials/nav/nav.php');

?>
<span onclick='openAppSideNav()' class="app__sidenav-openBtn" href='javascript:void(0)'>☰</span>

<!--- main nav  start--->


<!-- Main Nav End -->




<nav class='app__sidenav' id="appSideNav">

    <a href='javascript:void(0)' class="app__sidenav-closeBtn" onclick='closeAppSideNav()'>&times;</a>

    <aside>
        <!-- ul side nav start -->

        <ul class='app__sidenav-items'>
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>dashboard.php"
                    class="app__sidenav-itemLink">🏠Dashboard</a></li>
            <!-- POSTS -->
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>add_post.php" class="app__sidenav-itemLink">📝 Add
                    Post</a></li>
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>edit_post.php" class="app__sidenav-itemLink">📝 Edit
                    Post</a></li>

            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>manage_posts.php" class="app__sidenav-itemLink">📝
                    Manage
                    Post</a></li>



            <!--- USER RESTRICTED OPTIONS TO ADMIN START --->
            <?php
                        if (isset($_SESSION['user_is_admin'])) : ?>
            <!-- Users Start -->
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>add_user.php" class="app__sidenav-itemLink">Add
                    User👥</a></li>

            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>manage_users.php" class="app__sidenav-itemLink">Manage
                    Users👥</a>
                <!-- Users End-->

                <!-- Category Start -->
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>add_category.php" class="app__sidenav-itemLink">Add
                    Category✨</a>
            </li>
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>edit_category.php" class="app__sidenav-itemLink">Edit
                    Category✨</a>
            </li>
            <li class='app__sidenav-item'><a href="<?= HOME_URL ?>manage_categories.php"
                    class="app__sidenav-itemLink">Manage
                    Categories✨</a>
                <!-- Category end -->


                <?php endif; ?>
                <!--- USER RESTRICTED OPTIONS TO ADMIN END --->



                <!--RESTRICT SIGN IN IF LOGGGED IN SESSION START -->
                <?php if (isset($_SESSION['user-id'])) : ?>
            <li class='app__sidenav-item'><a href="<?= ROOT_URL ?>logout.php" class="app__sidenav-itemLink">🧧Logout</a>

                <?php else : ?>
            <li class='app__sidenav-item'><a href="<?= ROOT_URL ?>login.php" class="app__sidenav-itemLink">🚪Login</a>
            </li>


            <?php endif; ?>
            <!--RESTRICT SIGN IN IF LOGGGED IN SESSION END -->

            <!-- Back Home Start -->

            <li class='app__sidenav-item'><a href="http://localhost/portfolio/home.php"
                    class="app__sidenav-itemLink">↩️Return Home</a>
            </li>
            <!-- Back Home End -->

        </ul>
        <!-- ul side nav end -->
    </aside>


</nav>



<script>
var appSideNav = document.getElementById("appSideNav");

function openAppSideNav() {
    appSideNav.style.width = '90%';
    appSideNav.style.maxWidth = '15rem';
}

function closeAppSideNav() {
    appSideNav.style.width = '0rem';
}
</script>