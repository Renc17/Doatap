<?php

include '../../utils/config.php';
session_start();
if(isset($_SESSION['email']) ){
    session_destroy();
    header("location: " . BASE_URL . "index.php");
    exit();
}

?>