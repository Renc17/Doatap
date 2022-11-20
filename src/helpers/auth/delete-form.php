<?php

require('../../../config.php');
require(BASE_URL . 'controllers\forms.php');

session_start();
if(isset($_SESSION['id']) ){
    $controller = new FormController($database);
    $controller->deleteForm($_GET['id']);
    header('Location: '.'http://localhost/Doatap/src/views/requests.php');
}

?>