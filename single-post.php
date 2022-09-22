<?php
include('./partials/header/header.php');
include('./partials/nav/nav.php');
$page__title = 'Single Post';


if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    //header('location:' . HOME_URL . 'home.php');
    die();
}
?>

<h1><?php echo "$page__title" ?> </h1>


<h2><?= $post['title']; ?></h2>
<img src="<?= HOME_URL . 'images/' . $post['thumbnail'] ?>" class="app__card-img" alt="<?= $post['title']; ?>"
    loading="lazy" />

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


<p>
    <?= $post['body']; ?>
</p>