<?php
require 'config/database.php';

//cx stands for customer 
// if the global var post isset with the key of submit__login from the login button name attribute in login.php
if (isset($_POST['submitlogin'])) {
    $username__email = filter_var(
        $_POST['username__email'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
    $password = filter_var(
        $_POST['password'],
        FILTER_SANITIZE_FULL_SPECIAL_CHARS

    );
    if (!$username__email) {
        $_SESSION['login'] = "Your Email or username is required ";
    } else if (!$password) {
        $_SESSION['login'] = "Your Password is required";
    } else {
        // FETCH user from database
        $fetch__user__query = "SELECT * FROM users WHERE username='$username__email' OR email='$username__email' ";
        // FETCH user result
        $fetch__user__result = mysqli_query($connect__db, $fetch__user__query);

        if (mysqli_num_rows($fetch__user__result) == 1) {
            //CONVERTING the record in to an assoc array
            $user__record = mysqli_fetch_assoc($fetch__user__result);
            $db__password = $user__record['password'];
            // COMPARING password with password in db
            if (password_verify($password, $db__password)) {
                // SET session for access control 
                $_SESSION['user-id'] = $user__record['id'];
                // CHECK if the user is admin or not
                // SET session if user is admin
                if ($user__record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                }
                //LOG user in 
                header('location:' . HOME_URL . 'adminpanel');
            } else {
                $_SESSION['login'] = "Please double check your inputs 👍";
            }
        } else {
            $_SESSION['login'] = 'User was not found!';
        }
    }
    // if any issue exists  with login session redirect back to login session with login data
    if (isset($_SESSION['login'])) {
        $_SESSION['login-data'] = $_POST;
        header('location:' . HOME_URL . 'login.php');
        die();
    }
} else {
    header('location:' . HOME_URL . 'login.php');
    die();
};
