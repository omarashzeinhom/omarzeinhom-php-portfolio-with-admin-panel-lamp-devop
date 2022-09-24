<?php
$page__title = 'Posts Category';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $result = mysqli_query($connect__db, $query);
    $category_post = mysqli_fetch_assoc($result);
} else {
    header('location:' . HOME_URL . 'login.php');
    die();
}
?>

<h1><?php echo "$page__title" ?> </h1>
<!--- Categories -->
<?php
//fetch categories using category_id of post
$category_id = $id;
$category_query = "SELECT * FROM categories WHERE id=$category_id";
$category_result = mysqli_query($connect__db, $category_query);
$category = mysqli_fetch_assoc($category_result);
$category_title = $category['title'];
//echo $category_title;
?>
<h2>
    <?= $category_title; ?>
</h2>

<!-- Column Start --->

<div class="app__col">
    <!-- Card Start --->
    <div class="app__card" id="appCardId">
        <!-- Card Header Start --->
        <div class="app__card-header">

            <h2>
                <a href="<?= HOME_URL ?>single-post.php?id=<?= $category_post['id'] ?>">
                    <?= $category_post['title']; ?>
                </a>
            </h2>
        </div>
        <!-- Card Header End--->
        <a href="<?= HOME_URL ?>single-post.php?id=<?= $category_post['id'] ?>">
            <img src="<?= HOME_URL . 'images/' . $category_post['thumbnail'] ?>" class="app__card-img" alt="admin_post_thumbnail" loading="lazy" />
        </a>
        <!-- Card Footer Start --->
        <div class="app__card-footer">
            <button class="btn__sm">
                <a href="<?= HOME_URL ?>category-posts.php?id=<?= $category['id'] ?>">
                    <?= $category_title ?? null; ?>
                </a>
            </button>
            <!--- Posts End -->
            <!-- Card Author Start--->
            <div class="app__card-author">
                <?php
                //FETCH THE AUTHOR FROM USERS TABLE USING AUTHOR_ID
                $author_id = $category_post['author_id'];
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
                        Posted At: <?= date("F j, Y, G:i:s ", strtotime($category_post['date_time'])) ?>
                    </em>
                </small>
            </div><!-- Card Author End--->
        </div><!-- Card Footer End--->

    </div> <!-- Card End--->

</div> <!-- Column End--->

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