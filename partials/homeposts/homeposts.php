<?php
//$current_user_id = $_SESSION['user-id'];
$posts_query = "SELECT * FROM posts WHERE is_featured=1";
$posts_result =  mysqli_query($connect__db, $posts_query);
?>

<?php if (mysqli_num_rows($posts_result) >= 1) : ?>

<?php while ($single_post = mysqli_fetch_assoc($posts_result)) : ?>
<div class="app__col">
    <!-- Card Start --->
    <div class="app__card" id="appCardId">
        <!-- Card Header Start --->
        <div class="app__card-header">
            <!--- Posts Image Shadow Start   -->
            <div class="app__card-img-shadow">
                <a href="<?= HOME_URL ?>single-post.php?id=<?= $single_post['id'] ?>">
                    <img src="<?= HOME_URL . 'images/' . $single_post['thumbnail'] ?>" class="app__card-img"
                        alt="admin_post_thumbnail" loading="lazy" />
                </a>
                <!--- Posts Title  -->
                <h5 id="postsTitle"> <a href="<?= HOME_URL ?>single-post.php?id=<?= $single_post['id'] ?>">
                        <?= $single_post['title']; ?>
                    </a>
                </h5>
            </div>
            <!--- Posts Image Shadow End  -->

            <h6 class="app__td" id="postsBody" maxlength="100">
                <?= substr($single_post['body'], 0, 100)  . " ..."; ?>
            </h6>
        </div>
        <!-- Card Header End--->

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
                <a href="<?= HOME_URL ?>category-posts.php?id=<?= $category['id'] ?>">
                    <?= $category_title ?? null; ?>
                </a>
            </button>

            <!-- Card Author Start --->
            <div class="app__card-author">
                <?php
                        //FETCH THE AUTHOR FROM USERS TABLE USING AUTHOR_ID
                        $author_id = $single_post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connect__db, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>

                <strong>

                    <h5>
                        By: <?= "{$author['firstname']} {$author['lastname']}"; ?>
                    </h5>
                    <img src="./images/<?= $author['avatar'] ?>" class="app__nav-avatar"
                        alt="<?= "{$author['firstname']} {$author['lastname']}"; ?>" />
                </strong>
                <small>
                    <em>
                        Posted At: <?= date("F j, Y, G:i:s ", strtotime($single_post['date_time'])) ?>
                    </em>
                </small>

            </div><!-- Card Author End--->

        </div><!-- Card Footer End--->
    </div><!-- Card End--->
</div> <!-- Column End--->

<?php endwhile; ?>
<?php endif; ?>