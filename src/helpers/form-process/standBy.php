<?php

require('../../../config.php');
require(BASE_URL . 'controllers\forms.php');

session_start();
if(isset($_SESSION['id']) ){
    $controller = new FormController($database);
    $controller->AdminStandByForm($_GET['id'], $_GET['classes'], $_GET['department']);
    header('Location: '.'http://localhost/Doatap/src/views/dashboard.php');
}

?>