<?php

class CreateForm {
    private $data;
    private $files;
    private $errors = array();
    private $validation_data = array();

    function __construct($post_data, $files_data){
        $this->data = $post_data;
        $this->files = $files_data;
    }

    function validateForm(){
        if(!array_key_exists('consent', $this->data)){
            $this->addError('consent', 'Πρέπει να συμφωνείσεται με τους όρους');
        }
        
        
        $this->validateName();
        $this->validateSurname();
        $this->validateFatherName();
        $this->validateMotherName();
        $this->validateRoad();
        $this->validateNumber();
        $this->validateCity();
        $this->validatePobox();
        $this->validateCel();
        $this->validateEmail();
        $this->validateAFM();
        $this->validateAMKA();
        $this->validateIdentification();
        $this->validateID();
        $this->validateDepartment();
        $this->validateStudyCycle();
        $this->validateUniversity();
        $this->validateDiplomaCountry();

        $this->validateFiles();

        $this->validation_data['errors'] = $this->errors;
        $this->validation_data['files'] = $this->files;
        $this->validation_data['data'] = $this->data;
        
        return $this->validation_data;
    }

    function validateFiles(){
        foreach($this->files as $key => $file){
            if($file['size'] == 0){
                $this->addError($key, 'Το πεδίο '.$key.' είναι υποχρεωτικό');
            }else{
                $this->files[$key] = $file;
            }
        }
    }

    function validateName(){
        $name = trim($this->data['name']);
        if(empty($name)){
            $this->addError('name', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $name)){
                $this->addError('name', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            $this->addError('surname', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $surname)){
                $this->addError('surname', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateFatherName(){
        $field = trim($this->data['father_name']);
        if(empty($field)){
            $this->addError('father_name', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('father_name', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateMotherName(){
        $field = trim($this->data['mother_name']);
        if(empty($field)){
            $this->addError('mother', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('mother', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateIdentification(){
        $field = trim($this->data['identification']);
        if(empty($field)){
            $this->addError('identification', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('identification', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateID(){
        $field = trim($this->data['ID_num']);
        if(empty($field)){
            $this->addError('ID_num', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/[A-Z\s]{2}[0-9]{6}$/', $field)){
                $this->addError('ID_num', 'Το πεδίο πρέπει να περιέχει 2 κεφαλαία λατινικά γράμματα και 6 ψηφία');
            }
        }
    }


    function validateRoad(){
        $road = trim($this->data['road']);
        if(empty($road)){
            $this->addError('road', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $road)){
                $this->addError('road', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateNumber(){
        $number = trim($this->data['number']);
        if(empty($number)){
            $this->addError('number', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[0-9]*$/u', $number)){
                $this->addError('number', 'Το πεδίο πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateCity(){
        $city = trim($this->data['city']);
        if(empty($city)){
            $this->addError('city', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $city)){
                $this->addError('city', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validatePobox(){
        $pobox = trim($this->data['pobox']);
        if(empty($pobox)){
            $this->addError('pobox', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[0-9]{5}+$/u', $pobox)){
                $this->addError('pobox', 'Το πεδίο πρέπει να περιέχει 5 ψηφία');
            }
        }
    }

    function validateStudyCycle(){
        $study_cycle = trim($this->data['study_cycle']);
        if(empty($study_cycle)){
            $this->addError('study_cycle', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $study_cycle)){
                $this->addError('study_cycle', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }
   
    function validateDiplomaCountry(){
        $field = trim($this->data['diploma_country']);
        if(empty($field)){
            $this->addError('diploma_country', 'Το πεδίο είναι υποχρεωτικό');
        }
    }

    function validateCel(){
        $field = trim($this->data['cel']);
        if(empty($field)){
            $this->addError('cel', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[0-9]{10}$/', $field)){
                $this->addError('cel', 'Το πεδίο πρέπει να περιέχει 10 ψηφία');
            }
        }
    }

    function validateDepartment(){
        $field = trim($this->data['department']);
        if(empty($field)){
            $this->addError('department', 'Το πεδίο είναι υποχρεωτικό');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('department', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateUniversity(){
        $field = trim($this->data['university']);
        if(empty($field)){
            $this->addError('university', 'Το πεδίο είναι υποχρεωτικό');
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

    function validateAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            $this->addError('afm', 'Το πεδίο είναι υποχρεωτικό');
            return;
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
            return;
        }else{
            if(!preg_match('/^[0-9]{11}$/', $amka)){
                $this->addError('amka', 'Το πεδίο πρέπει να περιέχει 11 ψηφία');
            }
        }
    }






    function validateDraftForm(){
        

        $this->validateDraftName();
        $this->validateDraftSurname();
        $this->validateDraftFatherName();
        $this->validateDraftMotherName();
        $this->validateDraftRoad();
        $this->validateDraftNumber();
        $this->validateDraftCity();
        $this->validateDraftPobox();
        $this->validateDraftCel();
        $this->validateDraftEmail();
        $this->validateDraftAFM();
        $this->validateDraftAMKA();
        $this->validateDraftIdentification();
        $this->validateDraftID();
        $this->validateDraftDepartment();
        $this->validateDraftStudyCycle();
        $this->validateDraftUniversity();
        $this->validateDraftDiplomaCountry();

        $this->validateDraftFiles();

        $this->validation_data['errors'] = $this->errors;
        $this->validation_data['files'] = $this->files;
        $this->validation_data['data'] = $this->data;
        
        return $this->validation_data;
    }

    function validateDraftFiles(){
        foreach($this->files as $key => $file){
            if($file['size'] == 0){
                continue;
            }else{
                $this->files[$key] = $file;
            }
        }
    }

    function validateDraftName(){
        $name = trim($this->data['name']);
        if(empty($name)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $name)){
                $this->addError('name', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $surname)){
                $this->addError('surname', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftFatherName(){
        $field = trim($this->data['father_name']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('father_name', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftMotherName(){
        $field = trim($this->data['mother_name']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('mother', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftIdentification(){
        $field = trim($this->data['identification']);
        if(empty($field)){
            return;
        }
    }

    function validateDraftID(){
        $field = trim($this->data['ID_num']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/[A-Z\s]{2}[0-9]{6}$/', $field)){
                $this->addError('ID_num', 'Το πεδίο πρέπει να περιέχει 2 κεφαλαία λατινικά γράμματα και 6 ψηφία');
            }
        }
    }

    function validateDraftRoad(){
        $road = trim($this->data['road']);
        if(empty($road)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $road)){
                $this->addError('road', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftNumber(){
        $number = trim($this->data['number']);
        if(empty($number)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/u', $number)){
                $this->addError('name', 'Το πεδίο πρέπει να περιέχει μόνο ψηφία');
            }
        }
    }

    function validateDraftCity(){
        $city = trim($this->data['city']);
        if(empty($city)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $city)){
                $this->addError('city', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftPobox(){
        $pobox = trim($this->data['pobox']);
        if(empty($pobox)){
            return;
        }else{
            if(!preg_match('/^[0-9]{5}+$/u', $pobox)){
                $this->addError('pobox', 'Το πεδίο πρέπει να περιέχει 5 ψηφία');
            }
        }
    }

    function validateDraftStudyCycle(){
        $study_cycle = trim($this->data['study_cycle']);
        if(empty($study_cycle)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $study_cycle)){
                $this->addError('study_cycle', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }
   
    function validateDraftDiplomaCountry(){
        $field = trim($this->data['diploma_country']);
        if(empty($field)){
            return;
        }
    }

    function validateDraftCel(){
        $field = trim($this->data['cel']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $field)){
                $this->addError('cel', 'Το πεδίο πρέπει να περιέχει μόνο ψηφία');
            }
        }
    }

    function validateDraftDepartment(){
        $field = trim($this->data['department']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('department', 'Το πεδίο δεν πρέπει να περιέχει ψηφία');
            }
        }
    }

    function validateDraftUniversity(){
        $field = trim($this->data['university']);
        if(empty($field)){
            return;
        }
    }

    function validateDraftEmail(){
        $email = trim($this->data['email']);
        if(empty($email)){
            return;
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'Το email δεν είναι έγκυρο');
            }
        }
    }

    function validateDraftAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            return;
        }else{
            if(!preg_match('/^[0-9]{9}$/', $afm)){
                $this->addError('afm', 'Το πεδίο πρέπει να περιέχει 9 ψηφία');
            }
        }
    }

    function validateDraftAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            return;
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