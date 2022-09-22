<?php
//$current_user_id = $_SESSION['user-id'];
$posts_query = "SELECT * FROM posts WHERE is_featured=";
$posts_result =  mysqli_query($connect__db, $query);
?>

<?php if (mysqli_num_rows($posts_result) >= 1) : ?>

<?php while ($single_post = mysqli_fetch_assoc($posts_result)) : ?>
<div class="app__col">
    <!-- Card Start --->
    <div class="app__card" id="appCardId">
        <div class="app__card-header">
            <div class="app__card-img-shadow">
                <img src="<?= HOME_URL . 'images/' . $single_post['thumbnail'] ?>" class="app__card-img"
                    alt="admin_post_thumbnail" loading="lazy" />
            </div>
            <h5 id="postsTitle"> <a href="<?= HOME_URL ?>single-post.php?id<?= $single_post['id'] ?>">
                    <?= $single_post['title']; ?>
                </a>
            </h5>
            <!--- Posts Title  -->

            <h6 class="app__td" id="postsBody" maxlength="25">
                <?= substr($single_post['body'], 0, 25)  . " ..."; ?>
            </h6>
        </div>

        <div class="app__card-footer">
            <!-- Card Footer Start --->
            <!--- Categories -->
            <?php
                    //fetch categories using category_id of post
                    $category_id = $single_post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connect__db, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    $category_title = $category['title'];
                    ?>
            <!--- Posts Category -->
            <button class="btn__sm">
                <a href="<?= HOME_URL ?>category-posts.php?id<?= $category['id'] ?>">
                    <?= $category_title ?? null; ?>
                </a>
            </button>
            <!--- Posts End -->
            <div class="app__card-author">
                <strong>
                    <h5>
                        <?= date("F j, Y, G:i:s ", strtotime($single_post['date_time'])) ?>
                    </h5>

                </strong>
                <small>
                    <em>

                    </em>
                </small>

            </div>

        </div><!-- Card Footer End--->
    </div><!-- Card End--->



</div>
</div>
<!-- Btn Wrap  End--->
</div> <!-- Column End--->
<?php endwhile; ?>
<?php endif; ?>