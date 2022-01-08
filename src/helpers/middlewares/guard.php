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
    }else if($_SESSION['role'] == 'admin'){
        print('Access Forbidden');
        exit(0);
    }
}

function adminOnly(){
    if (empty($_SESSION['id'])) {
        header("location: login.php");
        exit(0);
    }else if($_SESSION['role'] == 'user'){
        print('Access Forbidden');
        exit(0);
    }
}

?>