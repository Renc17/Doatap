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
            $this->addError('name', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]*$/', $name)){
                $this->addError('name', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            $this->addError('surname', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]*$/', $surname)){
                $this->addError('surname', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
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

    function validateConfirmEmail(){
        $confirm = trim($this->data['confirm_email']);
        $email = trim($this->data['confirm_email']);
        
        if($confirm != $email){
            $this->addError('confirm_email', 'Το πεδίο δεν ταιριάζει με τον email');
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

    function validateConfirmPassword(){
        $confirm = trim($this->data['confirm_password']);
        $password = trim($this->data['password']);
        
        if($confirm != $password){
            $this->addError('confirm_password', 'Το πεδίο δεν ταιριάζει με τον κωδικό');
        }
    }

    function validateAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            $this->addError('afm', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[0-9]{9}$/', $afm)){
                $this->addError('afm', 'Το πεδίο πρέπει να περιέχει 9 ψηφία');
            }
        }
    }

    function validateAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            $this->addError('amka', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[0-9]{11}$/', $amka)){
                $this->addError('amka', 'Το πεδίο πρέπει να περιέχει 11 ψηφία');
            }
        }
    }


    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>