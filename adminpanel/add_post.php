<?php
$page__title = 'Add Post📝';
include('./partials/header/header.php');
include('./partials/sidenav/sidenav.php');
?>

<h1><?php echo $page__title; ?></h1>



 <!-- App Add User Start  -->
 <form class="app__adduser-form" action="<?= HOME_URL ?>add_user-logic.php" enctype="multipart/form-data" method="POST">
                <div class="row ">
                    <div class="col-12">
                        <!-- First Name  --->
                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Title</label>
                            <input name="firstname" value="" class="app__adduser-input" type="text" id="firstName" placeholder="Enter Post Title here..." />
                        </div>
                      

                        <!-- Post Text --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Text</label>
                            <textarea name="postcontent" value="<?= $email ?>" type="text" class="app__adduser-input" id="postcontent" style="resize:none;" >
                            </textarea>
                        </div>
                   



                        <!-- Post Thumbnail --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label" for="avatar">Thumbnail</label>
                            <input name="avatar" class="app__adduser-input" type="file" id="avatar" />
                            <!-- TODO AFTER FINISHING PROJECT ADD DEFAULT AVATAR IMAGES TO SELECT FROM-->
                            <small>
                                Make sure your image is less than 0.5mb use an image converter
                            </small>

                        </div>

                        <br />

                        <!-- Author or Admin Options  --->
                        <label class="app__inputs-label" for="avatar">Category</label>
                        <select name="user__role" value="" class="app__adduser-input">
                            <option value="0">ADD CATEGORIES HERE </option>
                           
                        </select>


                        <!-- Author or Admin Options  --->

                        <br />

                        <!-- Add new user Button key of name -->
                        <button class="btn" name="submit__newuser">
                            Add New Post
                        </button>
                        <!-- Add new user Button -->


                    </div>
                </div>
            </form>


<?php

include('./partials/footer/footer.php');
?>