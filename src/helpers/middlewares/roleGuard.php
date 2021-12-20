<?php

function usersOnly()
{
    if (empty($_SESSION['id'])) {
        header("location: index.php");
        exit(0);
    }
}

function adminOnly()
{
    if (empty($_SESSION['id']) && empty($_SESSION['admin'])) {
        header("location: index.php");
        exit(0);
    }
}

?>