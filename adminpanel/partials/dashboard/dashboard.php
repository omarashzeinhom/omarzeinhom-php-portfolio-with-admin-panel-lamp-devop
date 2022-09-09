<?php

include('./partials/sidenav/sidenav.php');

?>


<div class="app__dashboard">
    <div class="app__dashboard-items">
        <div class="app__dashboard-item">
            <a href="<?= HOME_URL ?>dashboard.php" class="app__dashboard-link">
                🏠 Home
            </a>
        </div>


        <div class="app__dashboard-icon">
            <a href="<?= HOME_URL ?>manage_posts.php" class="app__dashboard-link">
                📝 Posts
            </a>
        </div>
        <!--TODO: RESTRICT SIDE NAV ITEMS IF NOT ADMIN - RESTRICT USERS AND CATEGORIES -->
        <?php
        if (isset($_SESSION['user_is_admin'])) : ?>
            <div class="app__dashboard-icon">
                <a href="<?= HOME_URL ?>manage_users.php" class="app__dashboard-link">
                    👥 Users
                </a>
            </div>

            <div class="app__dashboard-icon">
                <a href="<?= HOME_URL ?>manage_categories.php" class="app__dashboard-link">
                    ✨ Categories
                </a>
            </div>
            <div class="app__dashboard-icon">
                <a href="<?= HOME_URL ?>manage_products.php" class="app__dashboard-link">
                    🛍️ Shop
                </a>
            </div>
        <?php endif; ?>

    </div>






</div>