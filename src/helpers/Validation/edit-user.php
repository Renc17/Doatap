<?php

class EditUser{
    private $data;
    private static $fields = [
        'AFM',
        'thl',
        'email'
    ];
    private $errors = [];

    function __construct($post_data)
    {
        $this->data = $post_data;
    }

    function validateForm(){
        foreach ($this->fields as $field) {
            if(!array_key_exists($field, $this->data)){
                $this->addError("Form", "$field doesn't exist");
                return;
            }
        }

        $this->validateAFM();
        $this->validateTHL();
        $this->validateEmail();
        return $this->errors;
    }

    function validateAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            // $this->addError('afm', 'afm cannot be empty');
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $afm)){
                $this->addError('name', 'name must contain numerical');
            }
        }
    }

    function validateTHL(){
        $thl = trim($this->data['surname']);
        if(empty($thl)){
            // $this->addError('thl', 'thlefono cannot be empty');
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $thl)){
                $this->addError('thl', 'thl must contain numerical');
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

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>