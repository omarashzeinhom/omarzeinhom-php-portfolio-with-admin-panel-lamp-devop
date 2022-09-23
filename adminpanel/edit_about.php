<?php
$page__title = 'Edit About 👤📝';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');

$query = "SELECT * FROM abouts";
$abouts = mysqli_query($connect__db, $query);

?>

<h1><?php echo $page__title; ?></h1>


<?php
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM abouts WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $about = mysqli_fetch_assoc($result);
} else {
    header('location:' . ADMIN_URL . 'manage_abouts.php');
    die("");
}; ?>


<section style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_about-logic.php" method="POST"
        enctype="multipart/form-data">
        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $about['id'] ?>" name="id" placeholder="Id" class="app__input">
        </div>
        <!-- Title  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Title</label>
            <input name="about_title" class="app__input" type="text" id="firstName" value="<?= $about['about_title'] ?>"
                placeholder="Enter About Title here..." />
        </div>
        <!-- Post Body Start  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Body</label>
            <textarea name="about_body" class="app__input" style="resize:none; " rows="8"
                value="<?= $about['about_body'] ?>" placeholder="test">
                <?= $about['about_body'] ?>
                </textarea>
        </div>
        <!-- Post Body End   --->
        <!-- Post Image Start  --->
        <small>TODO: Edit Thumbnmail For About</small>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Thumbnail</label>
            <img src="<?= ROOT_URL . 'images/' . $post['thumbnail'] ?>" class="app__thumbnail-avatar" />
            <input name="about_thumbnail" class="app__input" type="file" id="aboutThumbnail"
                placeholder="Enter About Thumbnail here." />
        </div>
        <!-- Post Image End --->
        <!-- Post Featured Start  --->

        <!-- Post Featured End  --->
        <button name="submit__editabout" type="submit" class="btn">Update About</button>
    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>