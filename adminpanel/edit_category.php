<?php
$page__title = 'Edit Category✨';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');
?>

<h1><?php echo $page__title; ?></h1>

<?php

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //FETCH CATEGORY FROM DATABASE 
    $query = "SELECT * FROM categories WHERE id=$id";
    $results = mysqli_query($connect__db, $query);
    if (mysqli_num_rows($results) == 1) {
        $category = mysqli_fetch_assoc($results);
    }
} else {
    header('location:' . HOME_URL . 'manage_categories.php');
    die();
}
?>


<section>
    <form class="app__form-section" action="<?= HOME_URL ?>edit_category-logic.php" method="POST">

        <!--- HIDDEN ID  NOT SECURE FIND ALTERNATIVE --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $category['id'] ?>" name="id" placeholder="id" class="app__adduser-input">
        </div>
        <!--- HIDDEN ID  NOT SECURE FIND ALTERNATIVE --->

        <div class="app__inputs-wrap">
            <input type="text" value="<?= $category['title'] ?>" name="title" placeholder="Title" class="app__adduser-input">
        </div>

        <div class="app__inputs-wrap">
            <textarea placeholder="<?= $category['description'] ?>" name='description' rows="4" style="resize: none;" class="app__adduser-input">
</textarea>
        </div>


        <button name="submit__editcategory" type="submit" class="btn">Update Category</button>
    </form>
</section>


<?php

include('./partials/footer/footer.php');
?>