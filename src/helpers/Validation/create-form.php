<?php

class CreateForm {
    private $data;
    private $fields = [
        'name',
        'surname',
        'gender',
        'father_name',
        'mother_name',
        'amka',
        'afm',
        'birth_country',
        'birth_city',
        'birth_date',
        'identification',
        'ID_num',
        'release_date',
        'release_country',
        'living_country',
        'living_city',
        'living_area',
        'address',
        'cel',
        'email',
        'diploma_type',
        'study_type',
        'diploma_recognition',
        'evaluation',
        'study_process',
        'study_country',
        'university',
        'department',
        'credits',
        'start_date',
        'deploma_date'
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
        $this->validateAFM();
        $this->validateAMKA();
        $this->validateCredits();
        $this->validateID();
        
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

    function validateAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $afm)){
                $this->addError('afm', 'name must contain numerical');
            }
        }
    }

    function validateAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $amka)){
                $this->addError('amka', 'name must contain numerical');
            }
        }
    }

    function validateID(){
        $id_num = trim($this->data['ID_num']);
        if(empty($id_num)){
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $id_num)){
                $this->addError('amka', 'name must contain numerical');
            }
        }
    }

    function validateCredits(){
        $credits = trim($this->data['credits']);
        if(empty($credits)){
            return;
        }else{
            if(!preg_match('/*[0-9]$/', $credits)){
                $this->addError('credits', 'must contain numerical');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>