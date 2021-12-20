<?php

include 'database/database.php';
include 'helpers/validation/create-user.php';
include 'helpers/validation/login-user.php';

$db = new Database();
$table = 'users';

$errors = array();
$name = '';
$surname = '';
$email = '';
$password = '';
$confirm_password = '';

if(isset($_POST['register'])){
    $user_validation = new CreateUser($_POST);
    $errors = $user_validation->validateForm();

    if(count($errors)){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
    }else{
        unset($_POST['register'], $_POST['confirm_password']);
        $_POST['role'] = 'user';
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user_id = $db->create($table, $_POST);
        if($user_id){
            $errors['users'] = 'user already exists';
            return;
        }
        header('location: login.php');
    }
}

if(isset($_POST['login']) ){
    $user_validation = new LoginUser($_POST);
    $errors = $user_validation->validateForm();

    if(count($errors)){
        print_r($errors);
        $email = $_POST['email'];
    }else{
        $user = $db->selectOne($table, ['email' => $_POST['email']]);
        if(!$user){
            return;
        }

        if(password_verify($_POST['password'], $user['password'])){
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];
            $_SESSION['afm'] = $user['afm'];
            $_SESSION['amka'] = $user['amka'];
            $_SESSION['cel'] = $user['cel'];
            $_SESSION['role'] = $user['role'];
            header('location: profile.php');
        }
    }
}

if(isset($_POST['admin'])){
    $user_validation = new CreateUser($_POST);
    $errors = $user_validation->validateForm();

    if(count($errors)){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
    }else{
        unset($_POST['admin'], $_POST['confirm_password']);
        $_POST['role'] = 'admin';
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $user_id = $db->create($table, $_POST);
        if($user_id){
            $errors['users'] = 'admin already exists';
            return;
        }
        header('location: login.php');
    }
}
?>