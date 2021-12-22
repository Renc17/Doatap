<?php

include '../../utils/config.php';
include '../../database/database.php';
include '../../controllers/users.php';

session_start();
if(isset($_SESSION['email']) ){
    $controller = new UserController();
    $controller->deleteUser($_SESSION);
    session_destroy();
    header("location: " . BASE_URL . "index.php");
    exit();
}

?>