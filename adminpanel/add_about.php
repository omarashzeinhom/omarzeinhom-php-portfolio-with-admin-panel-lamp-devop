<?php
$page__title = 'Add About 👤📝';
include('./partials/sidenav/sidenav.php');

//FETCH CATEGORIES FROM DATABASE


?>

<h1><?php echo $page__title; ?></h1>


<!-- Add Post Alert success start -->

<?php if (isset($SESSION_['add-about-success'])) : ?>
    <div class="app__alert-success">
        <p class="app__alert-success-p">
            <?= $_SESSION['add-about-success'];
            unset($_SESSION['add-about-success']); ?>
        </p>
    </div>
    <!-- Add Post Alert success End  -->

    <!-- Add Post Alert Failed  start -->

<?php elseif (isset($_SESSION['add-about'])) : ?>
    <div class="app__alert-error">
        <p class="app__alert-p">
            <?= $_SESSION['add-about'];
            unset($_SESSION['add-about']); ?>

        </p>
    </div>
    <!-- Add Post Alert Failed  End -->
<?php endif; ?>


<?php
if (isset($_SESSION['user_is_admin'])) : ?>

    <!-- App Add User Start  -->
    <form class="app__adduser-form" action="<?= HOME_URL ?>add_about-logic.php" enctype="multipart/form-data" method="POST" style=" width: 90vw; margin-left : 5vw;">
        <div class="row">
            <!-- Row Start   --->

            <div class="col-12">
                <!-- Col Start   --->

                <!-- Title  --->
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="title">Title</label>
                    <input name="about_title" class="app__input" type="text" id="firstName" placeholder="Enter About Title here..." />
                </div>
                <!-- Post Text --->
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="about_body">Body</label>
                    <textarea name="about_body" class="app__input" id="postcontent" style="resize:none; padding-bottom: 5rem; color:white;" rows="8" placeholder="Enter About Body here..." required maxlength="500000" autofocus>
                </textarea>
                </div>


                <!-- Post Thumbnail --->
                <div class="app__inputs-wrap">
                    <label class="app__inputs-label" for="thumbnail">Thumbnail</label>
                    <input name="about_thumbnail" class="app__input" type="file" id="avatar" />
                    <!-- TODO AFTER FINISHING PROJECT ADD DEFAULT AVATAR IMAGES TO SELECT FROM-->
                    <br />
                    <small>
                        Make sure your image is less than 0.5mb use an image converter
                    </small>
                </div>
                <!-- Add new user Button key of name -->
                <button class="btn" name="submit__newabout">
                    Add New About
                </button>
                <!-- Add new user Button -->

            </div><!-- Column End  -->
        </div> <!-- Row End  -->
    </form>

<?php endif; ?>

<?php
include('./partials/footer/footer.php');
?>