<?php

class CreateForm {
    private $data;
    private $files;
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
        'diploma_date'
    ];
    private $errors = array();
    private $validation_data = array();

    function __construct($post_data, $files_data){
        $this->data = $post_data;
        $this->files = $files_data;
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
        $this->validateFatherName();
        $this->validateMotherName();
        $this->validateAddress();
        $this->validateBirthCity();
        $this->validateBirthCountry();
        $this->validateBirthDate();
        $this->validateCel();
        $this->validateEmail();
        $this->validateAFM();
        $this->validateAMKA();
        $this->validateCredits();
        $this->validateID();
        $this->validateIdentification();
        $this->validateDepartment();
        $this->validateDiplomaType();
        $this->validateDiplomaDate();
        $this->validateUniversity();
        $this->validateStartDate();
        $this->validateStudyCountry();
        $this->validateStudyProcess();
        $this->validateStudyType();
        $this->validateReleaseCountry();
        $this->validateReleaseDate();
        $this->validateLivingArea();
        $this->validateLivingCity();
        $this->validateLivingCountry();

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
            $this->addError('name', 'name cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $name)){
                $this->addError('name', 'name must not contain numerical');
            }
        }
    }

    function validateSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            $this->addError('surname', 'surname cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $surname)){
                $this->addError('surname', 'surname must not contain numerical');
            }
        }
    }

    function validateFatherName(){
        $field = trim($this->data['father_name']);
        if(empty($field)){
            $this->addError('father_name', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('father_name', 'field must not contain numerical');
            }
        }
    }

    function validateMotherName(){
        $field = trim($this->data['mother_name']);
        if(empty($field)){
            $this->addError('mother', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('mother', 'field must not contain numerical');
            }
        }
    }

    function validateBirthCountry(){
        $field = trim($this->data['birth_country']);
        if(empty($field)){
            $this->addError('birth_country', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('birth_country', 'field must not contain numerical');
            }
        }
    }

    function validateBirthCity(){
        $field = trim($this->data['birth_city']);
        if(empty($field)){
            $this->addError('birth_city', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('birth_city', 'field must not contain numerical');
            }
        }
    }

    function validateBirthDate(){
        $field = trim($this->data['birth_date']);
        if(empty($field)){
            $this->addError('birth_date', 'field cannot be empty');
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('birth_date', 'field must not contain numerical');
            }
        }
    }

    function validateIdentification(){
        $field = trim($this->data['identification']);
        if(empty($field)){
            $this->addError('identification', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('identification', 'field must not contain numerical');
            }
        }
    }

    function validateID(){
        $field = trim($this->data['ID_num']);
        if(empty($field)){
            $this->addError('ID_num', 'field cannot be empty');
        }else{
            if(!preg_match('/[A-Z]{2}[0-9]{6}$/', $field)){
                $this->addError('ID_num', $field .' must not contain numerical');
            }
        }
    }

    function validateReleaseDate(){
        $field = trim($this->data['release_date']);
        if(empty($field)){
            $this->addError('release_date', 'field cannot be empty');
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('release_date', 'field must not contain numerical');
            }
        }
    }

    function validateReleaseCountry(){
        $field = trim($this->data['release_country']);
        if(empty($field)){
            $this->addError('release_country', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('release_country', 'field must not contain numerical');
            }
        }
    }

    function validateLivingCountry(){
        $field = trim($this->data['living_country']);
        if(empty($field)){
            $this->addError('living_country', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_country', 'field must not contain numerical');
            }
        }
    }

    function validateLivingCity(){
        $field = trim($this->data['living_city']);
        if(empty($field)){
            $this->addError('living_city', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_city', 'field must not contain numerical');
            }
        }
    }

    function validateLivingArea(){
        $field = trim($this->data['living_area']);
        if(empty($field)){
            $this->addError('living_area', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_area', 'field must not contain numerical');
            }
        }
    }

    function validateAddress(){
        $field = trim($this->data['address']);
        if(empty($field)){
            $this->addError('address', 'field cannot be empty');
        }
    }

    function validateCel(){
        $field = trim($this->data['cel']);
        if(empty($field)){
            $this->addError('cel', 'field cannot be empty');
        }else{
            if(!preg_match('/^[0-9]*$/', $field)){
                $this->addError('cel', 'field must not contain numerical');
            }
        }
    }

    function validateDiplomaType(){
        $field = trim($this->data['diploma_type']);
        if(empty($field)){
            $this->addError('diploma_type', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('diploma_type', 'field must not contain numerical');
            }
        }
    }

    function validateStudyType(){
        $field = trim($this->data['study_type']);
        if(empty($field)){
            $this->addError('study_type', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_type', 'field must not contain numerical');
            }
        }
    }

    function validateDiplomaRecognition(){
        $field = trim($this->data['diploma_recognition']);
        if(empty($field)){
            $this->addError('diploma_recognition', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('diploma_recognition', 'field must not contain numerical');
            }
        }
    }

    function validateEvaluation(){
        $field = trim($this->data['evaluation']);
        if(empty($field)){
            $this->addError('evaluation', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('evaluation', 'field must not contain numerical');
            }
        }
    }

    function validateStudyProcess(){
        $field = trim($this->data['study_process']);
        if(empty($field)){
            $this->addError('study_process', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_process', 'field must not contain numerical');
            }
        }
    }

    function validateStudyCountry(){
        $field = trim($this->data['study_country']);
        if(empty($field)){
            $this->addError('study_country', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_country', 'field must not contain numerical');
            }
        }
    }

    function validateDepartment(){
        $field = trim($this->data['department']);
        if(empty($field)){
            $this->addError('department', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('department', 'field must not contain numerical');
            }
        }
    }

    function validateUniversity(){
        $field = trim($this->data['university']);
        if(empty($field)){
            $this->addError('university', 'field cannot be empty');
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('university', 'field must not contain numerical');
            }
        }
    }

    function validateStartDate(){
        $field = trim($this->data['start_date']);
        if(empty($field)){
            $this->addError('start_date', 'field cannot be empty');
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('start_date', 'field must not contain numerical');
            }
        }
    }

    function validateDiplomaDate(){
        $field = trim($this->data['diploma_date']);
        if(empty($field)){
            $this->addError('diploma_date', 'field cannot be empty');
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('diploma_date', 'field must not contain numerical');
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
            $this->addError('afm', 'afm cannot be empty');
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $afm)){
                $this->addError('afm', 'name must contain numerical');
            }
        }
    }

    function validateAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            $this->addError('amka', 'amka cannot be empty');
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $amka)){
                $this->addError('amka', 'name must contain numerical');
            }
        }
    }

    function validateCredits(){
        $credits = trim($this->data['credits']);
        if(empty($credits)){
            $this->addError('credits', 'credit cannot be empty');
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $credits)){
                $this->addError('credits', 'must contain numerical');
            }
        }
    }

    function validateDraftForm(){
        foreach ($this->fields as $field) {
            if(!array_key_exists($field, $this->data)){
                trigger_error("Form: $field doesn't exist");
                exit();
            }
        }

        $this->validateDraftName();
        $this->validateDraftSurname();
        $this->validateDraftFatherName();
        $this->validateDraftMotherName();
        $this->validateDraftAddress();
        $this->validateDraftBirthCity();
        $this->validateDraftBirthCountry();
        $this->validateDraftBirthDate();
        $this->validateDraftCel();
        $this->validateDraftEmail();
        $this->validateDraftAFM();
        $this->validateDraftAMKA();
        $this->validateDraftCredits();
        $this->validateDraftID();
        $this->validateDraftIdentification();
        $this->validateDraftDepartment();
        $this->validateDraftDiplomaType();
        $this->validateDraftDiplomaDate();
        $this->validateDraftUniversity();
        $this->validateDraftStartDate();
        $this->validateDraftStudyCountry();
        $this->validateDraftStudyProcess();
        $this->validateDraftStudyType();
        $this->validateDraftReleaseCountry();
        $this->validateDraftReleaseDate();
        $this->validateDraftLivingArea();
        $this->validateDraftLivingCity();
        $this->validateDraftLivingCountry();

        $this->validateDraftFiles();

        $this->validation_data['errors'] = $this->errors;
        $this->validation_data['files'] = $this->files;
        
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
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $name)){
                $this->addError('name', 'name must not contain numerical');
            }
        }
    }

    function validateDraftSurname(){
        $surname = trim($this->data['surname']);
        if(empty($surname)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $surname)){
                $this->addError('surname', 'surname must not contain numerical');
            }
        }
    }

    function validateDraftFatherName(){
        $field = trim($this->data['father_name']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('father_name', 'field must not contain numerical');
            }
        }
    }

    function validateDraftMotherName(){
        $field = trim($this->data['mother_name']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('mother', 'field must not contain numerical');
            }
        }
    }

    function validateDraftBirthCountry(){
        $field = trim($this->data['birth_country']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('birth_country', 'field must not contain numerical');
            }
        }
    }

    function validateDraftBirthCity(){
        $field = trim($this->data['birth_city']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('birth_city', 'field must not contain numerical');
            }
        }
    }

    function validateDraftBirthDate(){
        $field = trim($this->data['birth_date']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('birth_date', 'field must not contain numerical');
            }
        }
    }

    function validateDraftIdentification(){
        $field = trim($this->data['identification']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('identification', 'field must not contain numerical');
            }
        }
    }

    function validateDraftID(){
        $field = trim($this->data['ID_num']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/[A-Z]{2}[0-9]{6}$/', $field)){
                $this->addError('ID_num', $field .' must not contain numerical');
            }
        }
    }

    function validateDraftReleaseDate(){
        $field = trim($this->data['release_date']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('release_date', 'field must not contain numerical');
            }
        }
    }

    function validateDraftReleaseCountry(){
        $field = trim($this->data['release_country']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('release_country', 'field must not contain numerical');
            }
        }
    }

    function validateDraftLivingCountry(){
        $field = trim($this->data['living_country']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_country', 'field must not contain numerical');
            }
        }
    }

    function validateDraftLivingCity(){
        $field = trim($this->data['living_city']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_city', 'field must not contain numerical');
            }
        }
    }

    function validateDraftLivingArea(){
        $field = trim($this->data['living_area']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('living_area', 'field must not contain numerical');
            }
        }
    }

    function validateDraftAddress(){
        $field = trim($this->data['address']);
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
                $this->addError('cel', 'field must not contain numerical');
            }
        }
    }

    function validateDraftDiplomaType(){
        $field = trim($this->data['diploma_type']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}\s]+$/u', $field)){
                $this->addError('diploma_type', 'field must not contain numerical');
            }
        }
    }

    function validateDraftStudyType(){
        $field = trim($this->data['study_type']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_type', 'field must not contain numerical');
            }
        }
    }

    function validateDraftDiplomaRecognition(){
        $field = trim($this->data['diploma_recognition']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('diploma_recognition', 'field must not contain numerical');
            }
        }
    }

    function validateDraftEvaluation(){
        $field = trim($this->data['evaluation']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('evaluation', 'field must not contain numerical');
            }
        }
    }

    function validateDraftStudyProcess(){
        $field = trim($this->data['study_process']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_process', 'field must not contain numerical');
            }
        }
    }

    function validateDraftStudyCountry(){
        $field = trim($this->data['study_country']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('study_country', 'field must not contain numerical');
            }
        }
    }

    function validateDraftDepartment(){
        $field = trim($this->data['department']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('department', 'field must not contain numerical');
            }
        }
    }

    function validateDraftUniversity(){
        $field = trim($this->data['university']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^[a-zA-Z\p{Greek}]+$/u', $field)){
                $this->addError('university', 'field must not contain numerical');
            }
        }
    }

    function validateDraftStartDate(){
        $field = trim($this->data['start_date']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('start_date', 'field must not contain numerical');
            }
        }
    }

    function validateDraftDiplomaDate(){
        $field = trim($this->data['diploma_date']);
        if(empty($field)){
            return;
        }else{
            if(!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $field)){
                $this->addError('diploma_date', 'field must not contain numerical');
            }
        }
    }

    function validateDraftEmail(){
        $email = trim($this->data['email']);
        if(empty($email)){
            return;
        }else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email is not valid');
            }
        }
    }

    function validateDraftAFM(){
        $afm = trim($this->data['afm']);
        if(empty($afm)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $afm)){
                $this->addError('afm', 'name must contain numerical');
            }
        }
    }

    function validateDraftAMKA(){
        $amka = trim($this->data['amka']);
        if(empty($amka)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $amka)){
                $this->addError('amka', 'name must contain numerical');
            }
        }
    }

    function validateDraftCredits(){
        $credits = trim($this->data['credits']);
        if(empty($credits)){
            return;
        }else{
            if(!preg_match('/^[0-9]*$/', $credits)){
                $this->addError('credits', 'must contain numerical');
            }
        }
    }

    function addError($key, $value){
        $this->errors[$key] = $value;
    }
}

?>