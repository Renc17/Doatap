<?php

require(BASE_URL. '\src\database\database.php');
require(BASE_URL. '\src\helpers\validation\create-user.php');
require(BASE_URL. '\src\helpers\validation\login-user.php');

class UserController{

    private static $table = 'users';
    private $db = null;

    private $errors = array();
    private $name = '';
    private $surname = '';
    private $email = '';
    private $password = '';
    private $confirm_password = '';

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
                    $errors['users'] = 'user already exists';
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

    function deleteUser($data){
        $this->db->delete(self::$table, ['id' => $data['id']]);
    }

}





?>