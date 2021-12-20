<?php

class CreateUser {
    private $data;
    private static $fields = [
        'email',
        'password',
    ];
    private $errors = [];

    function __construct($post_data){
        $this->data = $post_data;
    }

    function validateForm(){
        foreach ($this->fields as $field) {
            if(!array_key_exists($field, $this->data)){
                $this->addError("Form", "$field doesn't exist");
                return;
            }
        }

        $this->validateEmail();
        $this->validatePaswword();
        return $this->errors;
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
            if(!preg_match('/*[a-zA-Z0-9]{6-12}$/', $password)){
                $this->addError('password', 'password must be 6-12 characters');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>