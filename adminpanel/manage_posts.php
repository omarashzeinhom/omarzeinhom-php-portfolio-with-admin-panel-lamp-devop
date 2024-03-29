<?php
$page__title = 'Manage Posts📝';
include('./partials/sidenav/sidenav.php');


$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);
$queryc = "SELECT * FROM categories";
$categories = mysqli_query($connect__db, $queryc);

?>


<h1><?php echo $page__title; ?></h1>

<br />
<ul class=''>
    <li class='app__sidenav-item'><a class="app__link-btn" href="<?= ADMIN_URL ?>add_post.php">Add
            Post📝</a></li>
</ul>
<br />
<!-- Add Post Alert success Start -->
<?php if (isset($SESSION_['add-post-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= $_SESSION['add-post-success'];
            unset($_SESSION['add-post-success']); ?>
    </p>
</div>
<?php endif; ?>
<!-- Add Post Alert success End  -->

<table class="app__table" style="overflow: x-auto; margin: auto; max-width: 1700px; width:100%; height:100%;">
    <thead class="app__thead">
        <tr clas="app__tr">
            <th class="app_th">Title</th>
            <th class="app_th">Post</th>
            <th class="app_th">Thumbnail</th>
            <th class="app_th">Featured ?</th>
            <th class="app_th">Edit</th>
            <th class="app_th">Delete</th>
        </tr>
    </thead>
    <tbody class="app__tbody">
        <?php while ($single_post = mysqli_fetch_assoc($posts)) : ?>
        <!---LOOP THROUGH AND DISPLAY POSTS -->
        <tr clas="app__tr">
            <!--- Posts Title  -->

            <td class="app__td" id="postsTitle"><?= $single_post['title']; ?></td>
            <!--- Posts Body -->

            <td class="app__td" id="postsBody"> <?= substr($single_post['body'], 0, 50)  . " ..."; ?></td>
            <!--- Posts Thumbnail -->

            <td class="app__td" id="postsThumbnail"> <img src="<?= ROOT_URL . 'images/' . $single_post['thumbnail'] ?>"
                    style="padding-top: 0.4rem;border-radius: 15%; object-fit:cover; box-shadow: 0.1rem 0.1rem 0.1rem 0.1rem gray;"
                    class="app__thumbnail-avatar" width="50px" height="50px" alt="admin_post_thumbnail" /></td>
            <!--- Posts Featured -->

            <td class="app__td" id="postsFeatured"><input type="checkbox" value="" checked disabled /></td>
            <!--- Edit Posts  -->

            <td class="app__td"><a href="<?= ADMIN_URL ?>edit_post.php?id=<?= $single_post['id'] ?? null; ?>"
                    class="app__link-btn">Edit</a></td>
            <!--- Delete Posts  -->
            <td class="app__td"><a href="<?= ADMIN_URL ?>delete_post.php?id=<?= $single_post['id'] ?? null; ?>"
                    class="app__alert-btn-sm">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php

include('./partials/footer/footer.php');
?>