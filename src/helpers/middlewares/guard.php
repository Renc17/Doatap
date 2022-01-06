<?php

session_start();

function isLoggedIn(){
    if (!empty($_SESSION['id'])) {
        header("location: profile.php");
        exit(0);
    }
}

function usersOnly(){
    if (empty($_SESSION['id'])) {
        header("location: login.php");
        exit(0);
    }
}

function adminOnly(){
    if (empty($_SESSION['id']) && empty($_SESSION['admin'])) {
        header("location: login.php");
        exit(0);
    }
}

?>