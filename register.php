<?php
//start sessions for register page and register logic // must be started to work
session_start();
$page__title = 'Register';
include './partials/header/header.php';
include './partials/nav/nav.php';

//return back form data if there was a register error 
$firstname = $_SESSION['register-data']['firstname'] ?? null;
$lastname = $_SESSION['register-data']['lastname'] ?? null;
$username = $_SESSION['register-data']['username'] ?? null;
$email = $_SESSION['register-data']['email'] ?? null;
$createpassword = $_SESSION['register-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['register-data']['confirmpassword'] ?? null;
// delete register session after getting info 
unset($_SESSION['register-data']);

?>

<h1><?php echo "$page__title" ?> </h1>


<!--- Register Card Start --->
<div class="app__register-card">
    <!--- DEBUG ERROR MSG IN SESSION START  --->

    <?php
    if (isset($_SESSION['register'])) : ?>
        <div class="app__alert-error">
            <p class="app__alert-p">
                <?= $_SESSION['register'];
                unset($_SESSION['register']); ?>
            </p>

        </div>
        <!--- DEBUG ERROR MSG IN SESSION  END  --->

    <?php endif; ?>
    <!--- Form Start --->
    <form class="app__register-form" action="register__logic.php" enctype="multipart/form-data" method="POST">
        <div class="row ">
            <div class="col-12">
                <!-- First Name  --->
                <div class="app__inputs-wrap">
                    <label class="app__register-label">First Name</label>
                    <input name="firstname" value="<?= $firstname ?>" class="app__register-input" type="text" id="firstName" placeholder="Enter Name here..." />
                </div>
                <!-- Last Name  --->

                <div class="app__inputs-wrap">
                    <label class=" app__register-label">Last Name</label>
                    <input name="lastname" value="<?= $lastname ?>" class="app__register-input" type="text" id="lastName" placeholder="Enter Last Name here..." />
                </div>
                <!-- User Name  --->

                <div class="app__inputs-wrap">
                    <label class=" app__register-label">User Name</label>
                    <input name="username" value="<?= $username ?>" type="text" class="app__register-input" id="userName" placeholder="Enter User Name here..." />
                </div>

                <!-- Email  --->

                <div class="app__inputs-wrap">
                    <label class="app__register-label">Email</label>
                    <input name="email" value="<?= $email ?>" type="email" class="app__register-input" id="email" name="email" placeholder="email@global.com" />
                </div>
                <!-- Password --->

                <div class="app__inputs-wrap">
                    <label class="app__register-label">Password</label>
                    <input name="createpassword" value="<?= $createpassword ?>" class="app__register-input" type="password" id="createpassword" placeholder="Enter password here..." />
                </div>
                <!-- Confirm Password  --->

                <div class="app__inputs-wrap">
                    <label class="app__register-label">Confirm Password</label>
                    <input name="confirmpassword" value="<?= $confirmpassword ?>" class="app__register-input" type="password" id="confirmpassword" placeholder="Confrim password here..." />
                </div>
                <!-- Avatar --->

                <div class="app__inputs-wrap">
                    <label class="app__register-label" for="avatar">Avatar</label>
                    <input name="avatar" class="app__register-input" type="file" id="avatar" />
                    <small>
                        Make sure your image is less than 0.5mb use an image converter
                    </small>
                </div>


                <br />

                <!-- Register Button key of name -->
                <button class="app__register-btn" name="submit__register">
                    Register
                </button>
                <!-- Register Button -->

                <span class="app__register-span-text">
                    Already Have an Account?
                    <a href="login.php" class="app__register-span-link">
                        Login Now!
                    </a>
                </span>

                <small>
                    No Information is required except the name and password
                </small>
            </div>
        </div>
    </form>
    <!--- Form End --->

</div>
<!--- Register Card End --->

<?php
include('./partials/footer/footer.php');
?>