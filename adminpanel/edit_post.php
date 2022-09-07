<?php
$page__title = 'Edit Post📝';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');

$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);
$queryc = "SELECT * FROM categories";
$categories = mysqli_query($connect__db, $queryc);
?>

<h1><?php echo $page__title; ?></h1>



<section style="overflow: x-auto; margin: auto; max-width: 500px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_post-logic.php" method="POST"
        enctype="multipart/form-data">
        <?php while ($single_category = mysqli_fetch_assoc($categories)) : ?>

        <?php while ($single_post = mysqli_fetch_assoc($posts)) : ?>

        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $single_post['id'] ?>" name="id" placeholder="First Name"
                class="app__adduser-input">
        </div>

        <!-- Title  --->

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Title</label>
            <input name="title" class="app__adduser-input" type="text" id="firstName"
                value="<?= $single_post['title'] ?>" placeholder="Enter Post Title here..." />
        </div>
        <!-- Post Text --->

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Body</label>
            <textarea name="body" class="app__adduser-input" style="resize:none; " rows="8"
                value="<?= $single_post['body']; ?>">
                </textarea>
        </div>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Thumbnail</label>
            <input name="thumbnail" class="app__adduser-input" type="file" id="firstName"
                value="<?= $single_post['thumbnail'] ?>" placeholder="Enter Post Thumbnail here." />
        </div>
        <select class="app__adduser-input" name="selectrole__edituser">
            <option value="<?= $single_category['id']; ?>"><?= $single_category['title']; ?></option>

        </select>
        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Featured</label>
            <input type="checkbox" value="<?= $single_post['is_featured']; ?>" checked />
        </div>

        <button name="submit__editpost" type="submit" class="btn">Update Post</button>

        <?php endwhile; ?>

        <?php endwhile; ?>

    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>