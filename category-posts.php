<?php
$page__title = 'Posts Category';
include('./partials/header/header.php');
include('./partials/nav/nav.php');

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $result = mysqli_query($connect__db, $query);
    $posts = mysqli_fetch_assoc($result);
} else {
    header('location:' . HOME_URL . 'login.php');
    die();
}
//--- Categories -->
//fetch categories using category_id of post
$category_id = $id;
$category_query = "SELECT * FROM categories WHERE id=$category_id";
$category_result = mysqli_query($connect__db, $category_query);
$category = mysqli_fetch_assoc($category_result);
$category_title = $category['title'];
//TODO FIX NOT ALL Category POSTS Are Showing
?>
<!--- Posts Category -->
<h1> <?= $category_title ?? null; ?>
</h1>
<!--- Categories -->
<?php while ($post = mysqli_fetch_assoc($result)) : ?>
<div class="app__col">
    <!-- Card Start --->
    <div class="app__card" id="appCardId">
        <div class="app__card-header">
            <div class="app__card-img-shadow">
                <a href="<?= HOME_URL ?>single-post.php?id=<?= $post['id'] ?>">
                    <img src="<?= HOME_URL . 'images/' . $post['thumbnail'] ?>" class="app__card-img"
                        alt="admin_post_thumbnail" loading="lazy" />
                </a>
            </div>
            <h5 id="postsTitle"> <a href="<?= HOME_URL ?>single-post.php?id=<?= $post['id'] ?>">
                    <?= $post['title']; ?>
                </a>
            </h5>
            <!--- Posts Title  -->
            <h6 class="app__td" id="postsBody" maxlength="100">
                <?= substr($post['body'], 0, 100)  . " ..."; ?>
            </h6>
        </div>
        <div class="app__card-footer">
            <!-- Card Footer Start --->
            <!--- Posts End -->
            <div class="app__card-author">
                <?php
                    //FETCH THE AUTHOR FROM USERS TABLE USING AUTHOR_ID
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connect__db, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                    ?>
                <strong>
                    <h5>
                        By: <?= "{$author['firstname']} {$author['lastname']}"; ?>
                    </h5>
                    <img src="./images/<?= $author['avatar'] ?>" class="app__nav-avatar" />
                </strong>
                <small>
                    <em>
                        Posted At: <?= date("F j, Y, G:i:s ", strtotime($post['date_time'])) ?>
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


<!--- All Categories Start --->
<div class="app__container">
    <?php

    $all_categories_query = "SELECT * FROM categories";
    $all_categories_result = mysqli_query($connect__db, $all_categories_query);

    ?>
    <?php

    while ($category = mysqli_fetch_assoc($all_categories_result)) :
    ?>
    <button class="btn__sm">
        <a href="<?= HOME_URL ?>category-posts.php?id=<?= $category['id'] ?>">
            <?= $category['title'] ?? null; ?>
        </a>

    </button>
    <?php endwhile; ?>
</div>
<!--- All Categories End --->