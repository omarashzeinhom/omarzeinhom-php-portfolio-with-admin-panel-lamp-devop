<?php
$page__title = 'Add User👥';
include('./partials/sidenav/sidenav.php');

//return back form data if there was add-user-data error 
$firstname = $_SESSION['add-user-data']['firstname'] ?? null;
$lastname = $_SESSION['add-user-data']['lastname'] ?? null;
$username = $_SESSION['add-user-dataa']['username'] ?? null;
$email = $_SESSION['add-user-data']['email'] ?? null;
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? null;
// delete add-user-data  session after getting info 
$user__role = $_SESSION['add-user-data']['user__role'] ?? null;
unset($_SESSION['add-user-data']);

?>

<h1><?php echo $page__title; ?></h1>
<section class="app__section-form">
    <div class="container">

        <!--- Register Card Start --->
        <div class="app__form-card">
            <!--- DEBUG ERROR MSG IN SESSION START  --->

            <?php
            if (isset($_SESSION['add-user'])) : ?>
                <div class="app__alert-error">
                    <p class="app__alert-p">
                        <?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']); ?>
                    </p>

                </div>
                <!--- DEBUG ERROR MSG IN SESSION  END  --->
            <?php endif; ?>
            <!-- App Add User Start  -->
            <form class="app__adduser-form" action="<?= HOME_URL ?>add_user-logic.php" enctype="multipart/form-data" method="POST">
                <div class="row ">
                    <div class="col-12">
                        <!-- First Name  --->
                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">First Name</label>
                            <input name="firstname" value="<?= $firstname ?>" class="app__adduser-input" type="text" id="firstName" placeholder="Enter Name here..." />
                        </div>
                        <!-- Last Name  --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Last Name</label>
                            <input name="lastname" value="<?= $lastname ?>" class="app__adduser-input" type="text" id="lastName" placeholder="Enter Last Name here..." />
                        </div>
                        <!-- User Name  --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">User Name</label>
                            <input name="username" value="<?= $username ?>" type="text" class="app__adduser-input" id="userName" placeholder="Enter User Name here..." />
                        </div>

                        <!-- Email  --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Email</label>
                            <input name="email" value="<?= $email ?>" type="email" class="app__adduser-input" id="email" name="email" placeholder="email@global.com" />
                        </div>
                        <!-- Password --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Password</label>
                            <input name="createpassword" value="<?= $createpassword ?>" class="app__adduser-input" type="password" id="createpassword" placeholder="Enter password here..." />
                        </div>
                        <!-- Confirm Password  --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label">Confirm Password</label>
                            <input name="confirmpassword" value="<?= $confirmpassword ?>" class="app__adduser-input" type="password" id="confirmpassword" placeholder="Confrim password here..." />
                        </div>



                        <!-- Avatar --->

                        <div class="app__inputs-wrap">
                            <label class="app__inputs-label" for="avatar">Avatar</label>
                            <input name="avatar" class="app__adduser-input" type="file" id="avatar" />
                            <!-- TODO AFTER FINISHING PROJECT ADD DEFAULT AVATAR IMAGES TO SELECT FROM-->
                            <small>
                                Make sure your image is less than 0.5mb use an image converter
                            </small>

                        </div>

                        <br />

                        <!-- Author or Admin Options  --->
                        <label class="app__inputs-label" for="avatar">User Role</label>
                        <select name="user__role" value="<?= $user__role ?>" class="app__adduser-input">
                            <option value="0">Author</option>
                            <option value="1">Admin</option>
                        </select>


                        <!-- Author or Admin Options  --->

                        <br />

                        <!-- Add new user Button key of name -->
                        <button class="btn" name="submit__newuser">
                            Add New User
                        </button>
                        <!-- Add new user Button -->


                    </div>
                </div>
            </form>
            <!-- App Add User end -->

        </div>
</section>





<?php

include('./partials/footer/footer.php');
?>