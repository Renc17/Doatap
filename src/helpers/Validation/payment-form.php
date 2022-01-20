<?php

class MakePayment {
    private $data;
    private $errors = array();
    private $validation_data = array();

    function __construct($post_data){
        $this->data = $post_data;
    }

    function validateForm(){
        
        $this->validateCardNumber();
        $this->validateExpDate();
        $this->validateCVV();
        $this->validateName();

        $this->validation_data['errors'] = $this->errors;
        $this->validation_data['data'] = $this->data;
        
        return $this->validation_data;
    }

    function validateName(){
        $name = trim($this->data['owner']);
        if(empty($name)){
            $this->addError('owner', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $name)){
                $this->addError('owner', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateCardNumber(){
        $field = trim($this->data['card']);
        if(empty($field)){
            $this->addError('card', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/[0-9]{4}[\s]{1}[0-9]{4}[\s]{1}[0-9]{4}[\s]{1}[0-9]{4}$/', $field)){
                $this->addError('card', 'Το πεδίο πρέπει να περιέχει 16 ψηφία');
            }
        }
    }


    function validateExpDate(){
        $field = trim($this->data['exp-date']);
        if(empty($field)){
            $this->addError('exp-date', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^\d{2}\/\d{2}$/', $field)){
                $this->addError('exp-date', 'Το πεδίο είναι ημερομινία');
            }
        }
    }

    function validateCvv(){
        $field = trim($this->data['cvv']);
        if(empty($field)){
            $this->addError('cvv', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/[0-9]{3}$/', $field)){
                $this->addError('cvv', 'Το πεδίο πρέπει να περιέχει 3 ψηφία');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>