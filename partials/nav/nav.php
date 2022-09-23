<?php
// fetch the current user from the db 

if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * from users WHERE id=$id";
    $result = mysqli_query($connect__db, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<nav class='app__nav' id="app__main-nav">
    <a href="<?= HOME_URL ?>" class="app__nav-openBtn icon" style="float: left; padding-top: 3rem;">
        🏠
    </a>
    <ul class='app__nav-items'>

        <li class='app__nav-item active'><a href="<?= HOME_URL ?>home.php" class="app__nav-link">Home</a></li>
        <li class='app__nav-item'><a href='<?= HOME_URL ?>about.php' class="app__nav-link">About</a></li>
        <li class='app__nav-item'><a href='<?= HOME_URL ?>contact.php' class="app__nav-link">Contact Me</a></li>
        <li class='app__nav-item'><a href='<?= HOME_URL ?>shop.php' class="app__nav-link">Shop</a></li>
        <li class='app__nav-item'><a href='<?= HOME_URL ?>download.php' class="app__nav-link">Download</a></li>
        <!--Avatar Start -->
        <?php if (isset($_SESSION['user-id'])) : ?>
        <a href="<?= ADMIN_URL ?>" class="app__nav-link">
            <img alt="<?= $avatar['firstname'] ?>" class="app__nav-avatar" loading="lazy"
                src="<?= HOME_URL . 'images/' . $avatar['avatar'] ?>" />
            <small><?= $avatar['firstname'] ?></small>
        </a>
        <li class='app__nav-item'><a href="<?= HOME_URL ?>logout.php" class="app__nav-link">🧧Logout</a>
            <!--Avatar End -->
            <?php else : ?>
        <li class='app__nav-item'><a href="<?= HOME_URL ?>login.php" class="app__nav-link">🚪</a></li>
        <!--Login end-->
        <?php endif; ?>
        <!-- RESTRICT SIGN IN IF LOGGGED IN SESSION End-->


    </ul>
    <a href="javascript:void(0);" class="app__nav-openBtn icon" onclick="openNav()">
        ☰
    </a>
</nav>

<script>
//TODO: javascriptobfuscator IN PROD


function openNav() {
    var topNav = document.getElementById("app__main-nav");
    if (topNav.className === 'app__nav') {
        topNav.className += '-responsive';
    } else {
        topNav.className = 'app__nav';
    }
}
</script>