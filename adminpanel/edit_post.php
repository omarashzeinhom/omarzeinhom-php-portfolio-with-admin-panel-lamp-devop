<?php
$page__title = 'Edit Post📝';
//header already included in nav which is included in sidenav
include('./partials/sidenav/sidenav.php');
?>

<h1><?php echo $page__title; ?></h1>



<section style="overflow: x-auto; margin: auto; max-width: 1700px; width:100%; height:100%;">
    <form class="app__form-section" action="<?= HOME_URL ?>edit_post-logic.php" method="POST" enctype="multipart/form-data">

        <!--- HIDDEN ID --->
        <div class="app__inputs-wrap">
            <input type="hidden" value="<?= $user['id'] ?>" name="id" placeholder="First Name" class="app__adduser-input">
        </div>

        <!-- Title  --->

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="title">Title</label>
            <input name="title" class="app__adduser-input" type="text" id="firstName" placeholder="Enter Post Title here..." />
        </div>
        <!-- Post Text --->

        <div class="app__inputs-wrap">
            <label class="app__inputs-label" for="body">Body</label>
            <textarea name="body" class="app__adduser-input" id="postcontent" style="resize:none; padding-bottom: 7rem; color:white;" rows="8" placeholder="Enter Post Body here..." required maxlength="500000" autofocus>
                </textarea>
        </div>


        <select class="app__adduser-input" name="selectrole__edituser">
            <option value="0">Category</option>

        </select>
        <button name="submit__editpost" type="submit" class="btn">Update Post</button>
    </form>
</section>

<?php

include('./partials/footer/footer.php');
?>