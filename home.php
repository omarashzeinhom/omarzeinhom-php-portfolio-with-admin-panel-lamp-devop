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

<!--- Posts Featured -->



<!--- Posts Body -->
<div class="app__container">

    <div class="app__row">
        <div class="app__cards" className="app__cards">
            <div class="app__col">

                <!-- Card Start --->
                <div class="app__card" id="appCardId">
                    <div class="app__card-header">
                        <div class="app__card-img-shadow">
                            <img src="<?= HOME_URL . 'images/' . $single_post['thumbnail'] ?>" class="app__card-img"
                                alt="admin_post_thumbnail" loading="lazy" />
                        </div>
                        <h5 id="postsTitle"><?= $single_post['title']; ?></h5>
                        <!--- Posts Title  -->

                        <h6 class="app__td" id="postsBody"><?= $single_post['body']; ?></h6>
                    </div>


                </div>

                <div class="app__card-footer">
                    <!--- Posts Category -->
                    <button class="app__btn">
                        <?= $single_post['category_id'] ?? null; ?>

                    </button>
                </div>
            </div>
        </div>
        <!-- Card End--->





        <!-- Btn Wrap  End--->

    </div> <!-- Column End--->
</div> <!-- Row End--->
</div> <!-- Cards End--->
</div>
<!--- Container End -->
<?php endwhile; ?>





<?php
include('./partials/footer/footer.php');
?>