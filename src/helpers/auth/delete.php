<?php

require('../../../config.php');
require(BASE_URL . 'controllers\users.php');

session_start();
if(isset($_SESSION['id']) ){
    $controller = new UserController($database);
    $controller->deleteUser($_SESSION);
    session_destroy();
    header("location: http://localhost/Doatap/");
    exit();
}

?>