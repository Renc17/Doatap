<?php

require(BASE_URL. '\src\database\database.php');
require(BASE_URL. '\src\helpers\validation\create-user.php');
require(BASE_URL. '\src\helpers\validation\login-user.php');
require(BASE_URL. '\src\helpers\validation\edit-user.php');

class UserController{

    private static $table = 'users';
    private $db = null;

    private $errors = array();
    private $name = '';
    private $surname = '';
    private $email = '';
    private $password = '';
    private $confirm_password = '';

    private $afm = '';
    private $amka = '';
    private $cel = '';

    function __construct(){
        $this->db = new Database();
    }

    function getName(){
        return $this->name;
    }

    function setName($name){
        $this->name = $name;
    }

    function getSurname(){
        return $this->surname;
    }

    function setSurname($surname){
        $this->surname = $surname;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function getPassword(){
        return $this->password;
    }

    function getConfirmPassword(){
        return $this->confirm_password;
    }

    function setAMKA($AMKA){
        $this->amka = $AMKA;
    }

    function getAMKA(){
        return $this->amka;
    }

    function setAFM($afm){
        $this->afm = $afm;
    }

    function getAFM(){
        return $this->afm;
    }

    function setCel($cel){
        $this->cel = $cel;
    }

    function getCel(){
        return $this->cel;
    }

    function getErrors($field){
        if(isset($this->errors[$field]))
            return $this->errors[$field];
        return null;
    }

    function setErrors($errors){
        $this->errors = $errors;
    }

    function register(){
        if(isset($_POST['register'])){
            $user_validation = new CreateUser($_POST);
            $this->setErrors($user_validation->validateForm());

            if(count($this->errors)){
                $this->setName($_POST['name']);
                $this->setSurname($_POST['surname']);
                $this->setEmail($_POST['email']);
            }else{
                unset($_POST['register'], $_POST['confirm_password']);
                $_POST['role'] = 'user';
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
                $user_id = $this->db->create(self::$table, $_POST);
                if($user_id){
                    $this->errors['users'] = 'user already exists';
                    return;
                }
                header('location: login.php');
            }
        }
    }

    function login(){
        if(isset($_POST['login']) ){
            $user_validation = new LoginUser($_POST);
            $this->setErrors($user_validation->validateForm());
        
            if(count($this->errors)){
                $this->setEmail($_POST['email']);
            }else{
                $user = $this->db->selectOne(self::$table, ['email' => $_POST['email']]);
                if(!$user){
                    print('User doesnt exit');
                    exit();
                }
        
                if(password_verify($_POST['password'], $user['password'])){
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['surname'] = $user['surname'];
                    $_SESSION['AFM'] = $user['afm'];
                    $_SESSION['AMKA'] = $user['amka'];
                    $_SESSION['cel'] = $user['cel'];
                    $_SESSION['role'] = $user['role'];
                    header('location: profile.php');
                }
            }
        }
    }

    function adminRegister(){
        if(isset($_POST['admin'])){
            $user_validation = new CreateUser($_POST);
            $this->setErrors($user_validation->validateForm());

            if(count($this->errors)){
                $this->setName($_POST['name']);
                $this->setSurname($_POST['surname']);
                $this->setEmail($_POST['email']);
            }else{
                unset($_POST['admin'], $_POST['confirm_password']);
                $_POST['role'] = 'admin';
                $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

                $user_id = $this->db->create(self::$table, $_POST);
                if($user_id){
                    $errors['users'] = 'admin already exists';
                    return;
                }
                header('location: login.php');
            }
        }
    }

    function editUser(){
        if(isset($_POST['edit'])){
            $user_validation = new EditUser($_POST);
            $this->setErrors($user_validation->validateForm());

            if(count($this->errors)){
                $this->setCel($_SESSION['cel']);
                $this->setAMKA($_SESSION['AMKA']);
                $this->setAFM($_SESSION['AFM']);
            }else{
                unset($_POST['edit']);
                foreach($_POST as $key => $field){
                    if(!isset($field)){
                        $_POST[$key] = $_SESSION[$key];
                    }
                }
                $this->db->update(self::$table, $_SESSION['id'], $_POST);
                $this->setCel($_POST['cel']);
                $this->setAFM($_POST['AFM']);
                $this->setAMKA($_POST['AMKA']);
            }
        }
    }

    function deleteUser($data){
        $this->db->delete(self::$table, ['id' => $data['id']]);
    }
}
?>