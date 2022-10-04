<?php
//$current_user_id = $_SESSION['user-id'];
$downloads_query = "SELECT * FROM downloads";
$downloads_result =  mysqli_query($connect__db, $downloads_query);
?>

<?php if (mysqli_num_rows($downloads_result) >= 1) : ?>
    <?php while ($single_download = mysqli_fetch_assoc($downloads_result)) : ?>
        <div class="app__col">
            <!-- Card Start --->
            <div class="app__card app__js-scroll app__js-scrollelm fade-in" id="appCardId">
                <div class="app__card-header">
                    <h5 id="downloadTitle">
                        <a class="" href="<?= $single_download['download_link']; ?>" target="_blank" rel="noreferrer">
                            <?= $single_download['download_title']; ?>
                        </a>
                    </h5>
                </div>
                <div class="app__card-footer">
                    <!-- Card Footer Start --->
                    <h6 class="app__td" id="aboutBody" maxlength="100">
                        <a class="" href="<?= $single_download['download_alt_link']; ?>" target="_blank" rel="noreferrer">
                            <?= $single_download['download_alt_title']; ?>
                        </a>
                    </h6>
                </div><!-- Card Footer End--->
            </div><!-- Card End--->
        </div>
        </div>
        <!-- Btn Wrap  End--->
        </div> <!-- Column End--->
    <?php endwhile; ?>
<?php endif; ?>


<script src="global/js/scrollAnimations.js"></script>