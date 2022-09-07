<?php
$page__title = 'Home';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
$current_user_id = $_SESSION['user-id'];
$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);
?>
<h1><?php echo "$page__title" ?> </h1>


<?php while ($single_post = mysqli_fetch_assoc($posts)) : ?>
    <!---LOOP THROUGH AND DISPLAY POSTS -->
    <h5 id="postsTitle"><?= $single_post['title']; ?></h5>
    <!--- Posts Title  -->

    <h6 class="app__td" id="postsBody"><?= $single_post['body']; ?></h6>
    <!--- Posts Body -->

    <img src="<?= HOME_URL . 'images/' . $single_post['thumbnail'] ?>" style="border-radius: 90%;" width="50px" height="50px" alt="admin_post_thumbnail" />
    <!--- Posts Featured -->
    <button>
        <!--- Posts Category -->
        <?= $single_post['category'] ?? null; ?>
    </button>
<?php endwhile; ?>





<?php
include('./partials/footer/footer.php');
?>