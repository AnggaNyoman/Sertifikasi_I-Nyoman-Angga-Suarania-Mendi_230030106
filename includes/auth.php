<?php
// fungsi untuk login user

function login($username, $password) {

    // akun default
    $default_user = "admin";
    $default_pass = "admin123";

    if ($username === $default_user && $password === $default_pass) {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;
        return true;
    }

    return false;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}
?>