<?php
//$current_user_id = $_SESSION['user-id'];
$abouts_query = "SELECT * FROM abouts";
$abouts_result =  mysqli_query($connect__db, $abouts_query);
?>

<?php if (mysqli_num_rows($abouts_result) >= 1) : ?>

    <?php while ($single_about = mysqli_fetch_assoc($abouts_result)) : ?>
        <div class="app__col">
            <!-- Card Start --->
            <div class="app__card" id="appCardId">
                <div class="app__card-header">
                    <div class="app__card-img-shadow">

                        <img src="<?= HOME_URL . 'images/' . $single_about['about_thumbnail'] ?>" class="app__card-img" alt="admin_post_thumbnail" loading="lazy" />
                    </div>
                    <h5 id="postsTitle">
                        <?= $single_about['about_title']; ?>

                    </h5>
                    <!--- Posts Title  -->


                </div>

                <div class="app__card-footer">
                    <!-- Card Footer Start --->
                    <h6 class="app__td" id="aboutBody" maxlength="100">
                        <?= substr($single_about['about_body'], 0, 100)  . " ..."; ?>
                    </h6>

                </div><!-- Card Footer End--->
            </div><!-- Card End--->



        </div>
        </div>
        <!-- Btn Wrap  End--->
        </div> <!-- Column End--->
    <?php endwhile; ?>
<?php endif; ?>