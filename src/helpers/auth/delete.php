<?php

require('../../../config.php');
require(BASE_URL .'\src\controllers\users.php');

session_start();
if(isset($_SESSION['id']) ){
    $controller = new UserController();
    $controller->deleteUser($_SESSION);
    session_destroy();
    header("location: http://localhost/Doatap/");
    exit();
}

?>