<?php
$page__title = 'Index';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
$current_user_id = $_SESSION['user-id'];
$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);

?>


<h1><?php echo "$page__title" ?> </h1>



<?php
include('./partials/footer/footer.php');
?>