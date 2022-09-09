<?php
$page__title = 'Add Category✨';
include('./partials/sidenav/sidenav.php');
//SESSION VARS
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;
?>




<h1><?php echo $page__title; ?></h1>


<?php if (isset($_SESSION['user_is_admin'])) : ?>
    <section style=" width: 50vw; margin-left : 25vw;">
        <form action="add_category-logic.php" method="POST">
            <label class="app__inputs-label"></label>
            <input name='title' placeholder="Title" type="text" class="app__adduser-input" />
            <br />
            <textarea name='description' rows="4" placeholder="Description" style="resize: none;" class="app__adduser-input">
</textarea>
            <br />
            <button name="submit__addcategory" class="btn" type="submit">
                Add New Category
            </button>
        </form>
    </section>
<?php endif; ?>


<?php

include('./partials/footer/footer.php');
?>