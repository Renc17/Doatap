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
        $this->validatePaswword();
        $this->validateConfirmPassword();
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

    function validatePaswword(){
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

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>