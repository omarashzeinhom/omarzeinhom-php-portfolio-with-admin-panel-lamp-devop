<?php
include('./partials/header/header.php');
include('./partials/nav/nav.php');


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    //header('location:' . HOME_URL . 'home.php');
    die();
}
$page__title = $post['name'];
?>
<div class="app__card-lg">
    <h1><?php echo $page__title; ?></h1>
    <img src="<?= HOME_URL . 'images/' . $post['thumbnail'] ?>" class="app__card-img" alt="<?= $post['title']; ?>" loading="lazy" />
    <p style="font-size:medium;">
        <?= $post['description']; ?>
    </p>


</div>


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

<?php
include('./partials/footer/footer.php');
?>