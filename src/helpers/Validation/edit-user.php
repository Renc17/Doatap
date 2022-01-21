<?php

class EditUser{
    private $data;
    private static $fields = [
        'AFM',
        'AMKA',
        'cel',
    ];
    private $errors = [];

    function __construct($post_data)
    {
        $this->data = $post_data;
    }

    function validateForm(){
        foreach (self::$fields as $field) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("Form $field doesn't exist");
                exit();
            }
        }

        $this->validateAFM();
        $this->validateAMKA();
        $this->validateCel();
        return $this->errors;
    }

    function validateAFM(){
        $afm = trim($this->data['AFM']);
        if(empty($afm)){
            return;
        }else{
            if(!preg_match('/^[0-9]{9}$/', $afm)){
                $this->addError('AFM', 'Το πεδίο πρέπει να περιέχει 9 ψηφία');
            }
        }
    }

    function validateAMKA(){
        $amka = trim($this->data['AMKA']);
        if(empty($amka)){
            return;
        }else{
            if(!preg_match('/^[0-9]{11}$/', $amka)){
                $this->addError('amka', 'Το πεδίο πρέπει να περιέχει 11 ψηφία');
            }
        }
    }

    function validateCel(){
        $cel = trim($this->data['cel']);
        if(empty($cel)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $cel)){
                $this->addError('cel', 'Το πεδίο πρέπει να περιέχει ψηφία');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>