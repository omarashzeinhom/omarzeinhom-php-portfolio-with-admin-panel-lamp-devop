<?php
$page__title = 'Add Post📝';
include('./partials/sidenav/sidenav.php');

//FETCH CATEGORIES FROM DATABASE
$query = "SELECT * FROM categories";
$category = mysqli_query($connect__db, $query);
?>

<h1><?php echo $page__title; ?></h1>

<!-- App Add User Start  -->
<form class="app__adduser-form" action="<?= HOME_URL ?>add_post-logic.php" enctype="multipart/form-data" method="POST" style=" width: 90vw; margin-left : 5vw;">
    <div class="row ">
        <div class="col-12">
            <!-- First Name  --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="title">Title</label>
                <input name="title" value="" class="app__adduser-input" type="text" id="firstName" placeholder="Enter Post Title here..." />
            </div>
            <!-- Post Text --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="body">Body</label>
                <textarea name="body" type="text" class="app__adduser-input" id="postcontent" style="resize:none; padding-bottom: 5rem;" rows="8">
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
            <!-- Add new user Button key of name -->
            <button class="btn" name="submit__newpost">
                Add New Post
            </button>
            <!-- Add new user Button -->
            <div class="app__inputs-wrap">
                <!-- Post Categories Options  Start  --->

                <label class="app__inputs-label" for="avatar">Category</label>
                <select name="category" value="" class="app__adduser-input">
                    <?php while ($category = mysqli_fetch_assoc($category)) : ?>
                        <option value="<? $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <!-- Post Categories Options  End --->
        </div>
    </div>
</form>


<?php
include('./partials/footer/footer.php');
?>