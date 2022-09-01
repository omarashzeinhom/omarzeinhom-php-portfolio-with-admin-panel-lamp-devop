<?php
$page__title = 'Manage Categories✨';
include('./partials/sidenav/sidenav.php');

// QUERY
$category__db__query = "SELECT * FROM categories ORDER BY title ";
// RESULTS OF QUERY 
$categories = mysqli_query($connect__db, $category__db__query);
?>


<section class="app_section-form" style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%; ">
    <h1><?php echo $page__title; ?></h1>
    <!-- if @uth start -->

    <?php
    if (isset($_SESSION['user_is_admin'])) : ?>
    <ul>
        <li class='app__sidenav-item'><a href="<?= ADMIN_URL ?>add_category.php" class="app__link-btn">Add
                Category✨</a>
        </li>
        <li class='app__sidenav-item'><a href="<?= ADMIN_URL ?>edit_category.php" class="app__link-btn">Edit
                Category✨</a>
        </li>

    </ul>

    <!-- Alert success start -->

    <?php if (isset($SESSION_['add-category-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['add-category-success'];
                    unset($_SESSION['add-category-success']); ?>
        </p>
    </div>

    <?php elseif (isset($_SESSION['add-category'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']); ?>

        </p>
    </div>

    <!--- IF EDIT CATEGORY WAS SUCCESFULL-->

    <?php elseif (isset($_SESSION['edit-category-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['edit-category-success'];
                    unset($_SESSION['edit-category-success']); ?>

        </p>
    </div>
    <!--- IF EDIT CATEGORY WAS NOT SUCCESFULL-->
    <?php elseif (isset($_SESSION['edit-category'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['edit-category'];
                    unset($_SESSION['edit-category']); ?>

        </p>
    </div>
    <!--- IF DELETE CATEGORY WAS  SUCCESFULL-->
    <?php elseif (isset($_SESSION['delete-category-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['delete-category-success'];
                    unset($_SESSION['delete-category-success']); ?>

        </p>
    </div>


    <?php endif; ?>
    <!-- Alert success End -->

    <!-- Categories LESS THAN than 0 start -->

    <?php if (mysqli_num_rows($categories) > 0) : ?>
    <!--- Table and While Loop Start -->
    <div class="container" style="overflow: x-auto;">
        <table class="app__table">
            <thead class="app__thead">

                <tr clas="app__tr">
                    <th class="app_th">Title</th>
                    <th class="app_th">Description</th>
                    <th class="app_th">Edit</th>
                    <th class="app_th">Delete</th>

                </tr>

            </thead>
            <tbody class="app__tbody">
                <!---LOOP THROUGH AND DISPLAY USER -->
                <?php while ($categories = mysqli_fetch_assoc($categories)) : ?>
                <tr clas="app__tr">
                    <td class="app__td"><?= $categories['title']  ?></td>
                    <td class="app__td"><?= $categories['description'] ?? null ?></td>
                    <td class="app__td"><a href="<?= ADMIN_URL ?>edit_category.php?id=<?= $categories['id'] ?>"
                            class="app__link-btn">Edit</a></td>
                    <td class="app__td"><a href="<?= ADMIN_URL ?>delete_category.php?id=<?= $categories['id'] ?>"
                            class="app__alert-btn-sm">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else : ?>

    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= " No Catgories Found !" ?>

        </p>
    </div>



    <?php endif; ?>



    <!--- Table and While Loop End -->
    <?php endif; ?>
    <!-- if @uth End -->
</section>


<?php

include('./partials/footer/footer.php');
?>