<?php

class LoginUser {
    private $data;
    private $fields = [
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
                trigger_error("Form $field doesn't exist");
                exit();
            }
        }

        $this->validateEmail();
        $this->validatePassword();
        return $this->errors;
    }

    function validateEmail(){
        $email = trim($this->data['email']);
        if(empty($email)){
            $this->addError('email', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'Το email δεν είναι έγκυρο');
            }
        }
    }

    function validatePassword(){
        $password = trim($this->data['password']);
        if(empty($password)){
            $this->addError('password', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $password)){
                $this->addError('password', 'Το πεδίο πρέπει να περιέχει 6-12 ψηφία και λατινικους χαρακτήρες');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>