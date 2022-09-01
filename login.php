<?php
session_start();
$page__title = 'Login';
include('./partials/header/header.php');
include('./partials/nav/nav.php');




$username__email = $_SESSION['login-data']['username__email'] ?? null;
$password = $_SESSION['login-data']['password'] ?? null;
// unset the login-data
unset($_SESSION['login-data']);

?>





<!--- Dynamic Page Title --->

<h1><?php echo "$page__title" ?></h1>

<!--- Dynamic Page Title --->


<section id="login" class="app__login-section section__center">
    <?php
    if (isset($_SESSION['register-success'])) : ?>
        <div class="app__alert-success">
            <p class="app__alert-success-p">
                <?= $_SESSION['register-success'];
                unset($_SESSION['register-success']); ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['login'])) : ?>
        <div class="app__alert-error">
            <p class="app__alert-p">
                <?= $_SESSION['login'];
                unset($_SESSION['login']); ?>
            </p>
        </div>
    <?php endif ?>

    <!-- App login form start -->
    <form action="<?= HOME_URL ?>login__logic.php" method="POST">

        <div class="app__inputs-wrap">
            <label class="app__login-label">Email</label>
            <input name="username__email" value="<?= $username__email ?>" type="text" class="app__login-input" placeholder="Enter Email Here" />
        </div>

        <div class="app__inputs-wrap">
            <label class="app__login-label">Password</label>
            <input name="password" value="<?= $password ?>" type="password" class="app__login-input" placeholder="Enter password here..." />
        </div>

        <br />
        <!--- Submit btn  --->
        <button name="submitlogin" class="app__login-btn btn">
            Login
        </button>
        <!--- Submit btn  --->
        <br />
        <br />

        <span class="app__login-span-text">
            No Account
            <a href="register.php" class="app__login-span-link">
                Register Now!
            </a>
        </span>
    </form>
    <!-- App login form end -->

</section>




<?php
include('./partials/footer/footer.php');
?>