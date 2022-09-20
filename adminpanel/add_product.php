<?php
$page__title = 'Add Product 🛍️';
include('./partials/sidenav/sidenav.php');

//FETCH CATEGORIES FROM DATABASE
$query = "SELECT * FROM products";
$products = mysqli_query($connect__db, $query);

?>

<h1><?php echo $page__title; ?></h1>


<!-- Add Post Alert success start -->

<?php if (isset($SESSION_['add-product-success'])) : ?>
<div class="app__alert-success">
    <p class="app__alert-success-p">
        <?= implode($_SESSION['add-product-success']);
            unset($_SESSION['add-product-success']); ?>
    </p>
</div>
<!-- Add Post Alert success End  -->

<!-- Add Post Alert Failed  start -->

<?php elseif (isset($_SESSION['add-product'])) : ?>
<div class="app__alert-error">
    <p class="app__alert-p">
        <?=
            implode($_SESSION['add-product']);
            unset($_SESSION['add-product']); ?>

    </p>
</div>
<!-- Add Post Alert Failed  End -->
<?php endif; ?>




<!-- App Add User Start  -->
<form class="" action="<?= ADMIN_URL ?>add_product-logic.php" enctype="multipart/form-data" method="POST"
    style="width: 90vw; margin-left : 5vw;">
    <div class="row">
        <!-- Row Start   --->
        <?php
        if (isset($_SESSION['user_is_admin'])) : ?>
        <div class="col-12">
            <!-- Col Start   --->

            <!-- Title  --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="title">Title</label>
                <input name="name" class="app__input" type="text" id="firstName"
                    placeholder="Enter Product Title here..." />
            </div>
            <!-- Post Text --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="body">Description</label>
                <textarea name="description" class="app__input" id="postcontent"
                    style="resize:none; padding-bottom: 2.5rem; color:white;" rows="8"
                    placeholder="Enter Post Body here..." required maxlength="500000" autofocus>

                </textarea>
            </div>


            <!-- Post Thumbnail --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="thumbnail">Image</label>
                <input name="img" class="app__input" type="file" id="image" />
                <!-- TODO AFTER FINISHING PROJECT ADD DEFAULT AVATAR IMAGES TO SELECT FROM-->
                <br />
                <small>
                    Make sure your image is less than 0.5mb use an image converter
                </small>
            </div>
            <br />
            <!-- Author or Admin Options  --->

            <!-- Is Featured? --->
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="price">Price</label>
                <input name="price" value="" class="app__input" type="number" />
            </div>
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="retailprice">Retail Price</label>
                <input name="retailprice" value="" class="app__input" type="number" />
            </div>
            <div class="app__inputs-wrap">
                <label class="app__inputs-label" for="quantity">Quantity</label>
                <input name="quantity" value="" class="app__input" type="number" />
            </div>

            <!-- Author or Admin Options  --->
            <br />


            <!-- Post Categories Options  End --->

            <!-- Add new user Button key of name -->
            <button class="btn" name="submit__newproduct" type="submit">
                Add New Product
            </button>
            <!-- Add new user Button -->
            <?php endif; ?>

        </div><!-- Column End  -->
    </div> <!-- Row End  -->
</form>


<?php
include('./partials/footer/footer.php');
?>