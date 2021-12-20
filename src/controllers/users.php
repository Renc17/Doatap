<?php

include 'database/database.php';
include 'helpers/Validation/create-user.php';

$db = new Database();
$table = 'users';

$errors = array();
$name = '';
$surname = '';
$email = '';
$password = '';
$passwordConfirm = '';
$role = '';


if(isset($_POST['register'])){
    $user_validation = new CreateUser($_POST);
    $errors = $user_validation->validateForm();

    if(count($errors)){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
    }else{
        unset($_POST['register'], $_POST['confirm_password']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user_id = $db->create($table, $_POST);
    }
}else{
    print('NO');
}
?>