<?php
$page__title = 'Index';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);

?>


<h1><?php echo "$page__title" ?> </h1>

<?php include('./partials/homeposts/homeposts.php'); ?>

<?php
include('./partials/footer/footer.php');
?>