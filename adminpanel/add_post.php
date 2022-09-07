<?php
$page__title = 'Add Post 📝';
include('./partials/sidenav/sidenav.php');

//FETCH CATEGORIES FROM DATABASE
$query = "SELECT * FROM categories";
$categories = mysqli_query($connect__db, $query);

?>

<h1><?php echo $page__title; ?></h1>


<!-- Add Post Alert success start -->

<?php if (isset($SESSION_['add-post-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= $_SESSION['add-post-success'];
            unset($_SESSION['add-post-success']); ?>
    </p>
</div>
<!-- Add Post Alert success End  -->

<!-- Add Post Alert Failed  start -->

<?php elseif (isset($_SESSION['add-post'])) : ?>
<div class="app__alert-error">
    <p class="app__alert-p">
        <?= $_SESSION['add-post'];
            unset($_SESSION['add-post']); ?>

    </p>
</div>
<!-- Add Post Alert Failed  End -->
<?php endif; ?>




<!-- App Add User Start  -->
<form class="app__adduser-form" action="<?= HOME_URL ?>add_post-logic.php" enctype="multipart/form-data" method="POST"
    style=" width: 90vw; margin-left : 5vw;">
    <div class="row">
        <!-- Row Start   --->

        <div class="col-12">
            <!-- Col Start   --->

            <!-- First Name  --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="title">Title</label>
                <input name="title" class="app__adduser-input" type="text" id="firstName"
                    placeholder="Enter Post Title here..." />
            </div>
            <!-- Post Text --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="body">Body</label>
                <textarea name="body" class="app__adduser-input" id="postcontent"
                    style="resize:none; padding-bottom: 7rem; color:white;" rows="8"
                    placeholder="Enter Post Body here..." required maxlength="500000" autofocus>
                </textarea>
            </div>


            <!-- Post Thumbnail --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="thumbnail">Thumbnail</label>
                <input name="thumbnail" class="app__adduser-input" type="file" id="avatar" />
                <!-- TODO AFTER FINISHING PROJECT ADD DEFAULT AVATAR IMAGES TO SELECT FROM-->
                <br />
                <small>
                    Make sure your image is less than 0.5mb use an image converter
                </small>
            </div>
            <br />
            <!-- Author or Admin Options  --->
            <?php
            if (isset($_SESSION['user_is_admin'])) : ?>
            <!-- Is Featured? --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="is_featured">Featured</label>
                <input name="is_featured" value="" class="app__adduser-input" type="checkbox" id="isFeatured" checked />
            </div>
            <?php endif; ?>

            <!-- Author or Admin Options  --->
            <br />

            <div class="app__inputs-wrap">
                <!-- Post Categories Options  Start  --->
                <label class="app__inputs-label" for="avatar">Category</label>
                <select name="category" class="app__adduser-input">
                    <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id']; ?>" label="<?= $category['title']; ?>">
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <!-- Post Categories Options  End --->

            <!-- Add new user Button key of name -->
            <button class="btn" name="submit__newpost">
                Add New Post
            </button>
            <!-- Add new user Button -->

        </div><!-- Column End  -->
    </div> <!-- Row End  -->
</form>


<?php
include('./partials/footer/footer.php');
?>