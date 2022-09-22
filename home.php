<?php
$page__title = 'Home';
include('./partials/header/header.php');
include('./partials/nav/nav.php');
$query = "SELECT * FROM posts";
$posts = mysqli_query($connect__db, $query);
?>
<h1><?php echo "$page__title" ?> </h1>


<!---LOOP THROUGH AND DISPLAY POSTS -->

<!--- Posts Featured -->



<!--- Posts Body -->
<div class="app__container">

    <div class="app__row">
        <div class="app__cards" className="app__cards">
            <?php include('./partials/homeposts/homeposts.php'); ?>
        </div> <!-- Row End--->
    </div> <!-- Cards End--->

</div>
<!--- Container End -->





<?php
include('./partials/footer/footer.php');
?>