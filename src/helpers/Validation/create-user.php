<?php

class CreateUser {
    private $data;
    private $fields = [
        'name',
        'surname',
        'email',
        'password',
        'confirm_password'
    ];
    private $errors = [];

    function __construct($post_data){
        $this->data = $post_data;
    }

    function validateForm(){
        foreach ($this->fields as $field) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("Form: $field doesn't exist");
                exit();
            }
        }

        $this->validateName();
        $this->validateSurname();
        $this->validateEmail();
        $this->validateConfirmEmail();
        $this->validatePassword();
        $this->validateConfirmPassword();
        $this->validateAFM();
        $this->validateAMKA();
        return $this->errors;
    }

    function validateName(){
        $name = trim($this->data['name']);
        if(empty($name)){
            $this->addError('name', 'name cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z]*$/', $name)){
                $this->addError('name', 'name must not contain numerical');
            }
        }
    }

    function validateSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            $this->addError('surname', 'surname cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z]*$/', $surname)){
                $this->addError('surname', 'surname must not contain numerical');
            }
        }
    }

    function validateEmail(){
        $email = trim($this->data['email']);
        if(empty($email)){
            $this->addError('email', 'email cannot be empty');
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email is not valid');
            }
        }
    }

    function validateConfirmEmail(){
        $confirm = trim($this->data['confirm_email']);
        $email = trim($this->data['confirm_email']);
        
        if($confirm != $email){
            $this->addError('confirm_email', 'email doesnt match');
        }
    }

    function validatePassword(){
        $password = trim($this->data['password']);
        if(empty($password)){
            $this->addError('password', 'password cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                $this->addError('password', 'password must be 6-12 characters');
            }
        }
    }

    function validateConfirmPassword(){
        $confirm = trim($this->data['confirm_password']);
        $password = trim($this->data['password']);
        
        if($confirm != $password){
            $this->addError('confirm_password', 'password confirmation doesnt match');
        }
    }

    function validateAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            $this->addError('afm', 'surname cannot be empty');
        }else{
            if(!preg_match('/^[0-9]{9}$/', $afm)){
                $this->addError('afm', 'surname must not contain numerical');
            }
        }
    }

    function validateAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            $this->addError('amka', 'amka cannot be empty');
        }else{
            if(!preg_match('/^[0-9]{11}$/', $amka)){
                $this->addError('amka', 'amka must not contain numerical');
            }
        }
    }


    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>