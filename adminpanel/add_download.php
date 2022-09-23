<?php
$page__title = 'Add Download 📥';
include('./partials/sidenav/sidenav.php');

//FETCH CATEGORIES FROM DATABASE


?>

<h1><?php echo $page__title; ?></h1>


<!-- Add Post Alert success start -->

<?php if (isset($SESSION_['add-download-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['add-download-success'];
            unset($_SESSION['add-download-success']); ?>
        </p>
    </div>
    <!-- Add Post Alert success End  -->

    <!-- Add Post Alert Failed  start -->

<?php elseif (isset($_SESSION['add-download'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['add-download'];
            unset($_SESSION['add-download']); ?>

        </p>
    </div>
    <!-- Add Post Alert Failed  End -->
<?php endif; ?>


<?php
if (isset($_SESSION['user_is_admin'])) : ?>

    <!-- App Add User Start  -->
    <form class="app__adduser-form" action="<?= HOME_URL ?>add_download-logic.php" enctype="multipart/form-data" method="POST" style=" width: 90vw; margin-left : 5vw;">
        <div class="row">
            <!-- Row Start   --->

            <div class="col-12">
                <!-- Col Start   --->

                <!-- Title  --->
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="title">Title</label>
                    <input name="download_title" class="app__input" type="text" id="firstName" placeholder="Enter Download Title here..." />
                </div>
                <!-- Post Text --->
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="title">Main Link</label>
                    <input name="download_link" class="app__input" type="text" id="firstName" placeholder="Enter Download Link here..." />
                </div>
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="title">Alt Title</label>
                    <input name="download_alt_title" class="app__input" type="text" id="firstName" placeholder="Enter Download Alt Title here..." />
                </div>

                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="title">Alt Link Title</label>
                    <input name="download_alt_link" class="app__input" type="text" id="firstName" placeholder="Enter Alt Download Link here..." />
                </div>

                <!-- Add new user Button key of name -->
                <button class="btn" name="submit__newdownload">
                    Add New Download
                </button>
                <!-- Add new user Button -->

            </div><!-- Column End  -->
        </div> <!-- Row End  -->
    </form>

<?php endif; ?>

<?php
include('./partials/footer/footer.php');
?>