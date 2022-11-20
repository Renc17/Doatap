<?php

require('../../../config.php');
require(BASE_URL . 'controllers\forms.php');

session_start();
if(isset($_SESSION['id']) ){
    $controller = new FormController($database);
    $controller->AdminRejectForm($_GET['id'], $_GET['reasons'], $_GET['comment']);
    header('Location: '.'http://localhost/Doatap/src/views/dashboard.php');
}

?>