<?php
$page__title = 'Dashboard 🏠';
include('./partials/header/header.php');
include('./partials/sidenav/sidenav.php');


?>

<h1><?php echo $page__title; ?></h1>


<?php
include('./partials/dashboard/dashboard.php');
?>

<?php

include('./partials/footer/footer.php');
?>