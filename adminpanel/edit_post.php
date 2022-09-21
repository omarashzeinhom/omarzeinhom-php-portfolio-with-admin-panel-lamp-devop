<?php
$page__title = 'Edit Post📝';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');

$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);
$queryc = "SELECT * FROM categories";
$categories = mysqli_query($connect__db, $queryc);

$img__query = "UPDATE posts thumbnail";

?>

<h1><?php echo $page__title; ?></h1>


<?php
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location:' . ADMIN_URL . 'manage_posts.php');
    die("");
}; ?>


<section style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_post-logic.php" method="POST"
        enctype="multipart/form-data">
        <select class="app__input" name="selectrole__edituser">

            <?php while ($single_category = mysqli_fetch_assoc($categories)) : ?>
            <?php

                echo ($post['id']);; ?>
            <option value="<?= $single_category['id']; ?>"><?= $single_category['title']; ?></option>

            <?php endwhile; ?>
        </select>

        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $post['id'] ?>" name="id" placeholder="First Name" class="app__input">
        </div>
        <!-- Title  --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Title</label>
            <input name="title" class="app__input" type="text" id="firstName" value="<?= $post['title'] ?>"
                placeholder="Enter Post Title here..." />
        </div>
        <!-- Post Text --->
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Body</label>
            <textarea name="body" class="app__input" style="resize:none; " rows="8" value="<?= $post['body'] ?>"
                placeholder="test">
                <?= $post['body'] ?>
                </textarea>
        </div>

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Thumbnail</label>
            <img src="<?= ROOT_URL . 'images/' . $post['thumbnail'] ?>" class="app__thumbnail-avatar" />
            <input name="thumbnail" class="app__input" type="file" id="firstName"
                value="<?= ROOT_URL . 'images/' . $post['thumbnail'] ?>" placeholder="Enter Post Thumbnail here." />
        </div>

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Featured</label>
            <input type="checkbox" value="<?= $post['is_featured']; ?>" checked />
        </div>

        <button name="submit__editpost" type="submit" class="btn">Update Post</button>



    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>