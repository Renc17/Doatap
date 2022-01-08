<?php

session_start();

function isLoggedIn(){
    if (!empty($_SESSION['id'])) {
        if($_SESSION['role'] == 'admin')
            header("location: dashboard.php");
        else if($_SESSION['role'] == 'user')
            header("location: profile.php");
    }
}

function usersOnly(){
    if (empty($_SESSION['id'])) {
        header("location: login.php");
        exit(0);
    }else if($_SESSION['role'] == 'admin'){
        header("location: forbidden.html");
        exit(0);
    }
}

function adminOnly(){
    if (empty($_SESSION['id'])) {
        header("location: login.php");
        exit(0);
    }else if($_SESSION['role'] == 'user'){
        header("location: forbidden.html");
        exit(0);
    }
}

?>