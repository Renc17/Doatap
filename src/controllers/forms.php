<?php

require(BASE_URL. 'helpers\validation\create-form.php');

class FormController{
    private static $table = 'forms';
    private static $files_table = 'files';
    private $db = null;

    private $errors = array();
    private $files = array();

    private $name = ''; 
    private $surname = '';
    private $gender = '';
    private $father_name = '';
    private $mother_name = '';
    private $amka = '';
    private $afm = '';
    private $birth_country = '';
    private $birth_city = '';
    private $birth_date = '';
    private $identification = '';
    private $ID_num = '';
    private $release_date = '';
    private $release_country = '';
    private $living_country = '';
    private $living_city = '';
    private $living_area = '';
    private $address = '';
    private $cel = '';
    private $email = '';
    private $diploma_type = '';
    private $study_type = '';
    private $diploma_recognition = '';
    private $evaluation = '';
    private $study_process = '';
    private $study_country = '';
    private $university = '';
    private $department = '';
    private $credits = '';
    private $start_date = '';
    private $diploma_date = '';
    private $comment = '';

    function __construct($database){

        $this->db = $database;
        $this->name = $_SESSION['name'];
        $this->surname = $_SESSION['surname'];
        $this->email = $_SESSION['email'];
        $this->afm = $_SESSION['AFM'];
        $this->amka = $_SESSION['AMKA'];
    }

    function getName(){
        return $this->name;
    }

    function getSurname(){
        return $this->surname;
    }

    function getGender(){
        return $this->gender;
    }

    function getFatherName(){
        return $this->father_name;
    }

    function getMotherName(){
        return $this->mother_name;
    }

    function getAMKA(){
        return $this->amka;
    }

    function getAFM(){
        return $this->afm;
    }

    function getBirthCountry(){
        return $this->birth_country;
    }

    function getBirthCity(){
        return $this->birth_city;
    }

    function getBirthDate(){
        return $this->birth_date;
    }

    function getIdentification(){
        return $this->identification;
    }

    function getIDNum(){
        return $this->ID_num;
    }

    function getReleaseDate(){
        return $this->release_date;
    }

    function getReleaseCountry(){
        return $this->release_country;
    }

    function getLivingCountry(){
        return $this->living_country;
    }

    function getLivingCity(){
        return $this->living_city;
    }

    function getLivingArea(){
        return $this->living_area;
    }

    function getAddress(){
        return $this->address;
    }

    function getCel(){
        return $this->cel;
    }

    function getEmail(){
        return $this->email;
    }

    function getDiplomaType(){
        return $this->diploma_type;
    }

    function getDiplomaRecognition(){
        return $this->diploma_recognition;
    }

    function getStudyType(){
        return $this->study_type;
    }

    function getEvaluation(){
        return $this->evaluation;
    }

    function getStudyProcess(){
        return $this->study_process;
    }

    function getStudyCountry(){
        return $this->study_country;
    }

    function getUniversity(){
        return $this->university;
    }

    function getDepartment(){
        return $this->department;
    }

    function getCredits(){
        return $this->credits;
    }

    function getStartDate(){
        return $this->start_date;
    }

    function getDiplomaDate(){
        return $this->diploma_date;
    }

    function getComment(){
        return $this->comment;
    }

    function create(){
        if(isset($_POST['submit-form'])){
            $form_validation = new CreateForm($_POST, $_FILES);
            $data = $form_validation->validateForm();

            $this->setErrors($data['errors']);
            $this->setFiles($data['files']);

            if(count($this->errors)){
                $this->gender = $_POST['gender'];
                $this->father_name = $_POST['father_name'];
                $this->mother_name = $_POST['mother_name'];
                $this->diploma_date = $_POST['diploma_date'];
                $this->start_date = $_POST['start_date'];
                $this->credits = $_POST['credits'];
                $this->department = $_POST['department'];
                $this->university = $_POST['university'];
                $this->study_country = $_POST['study_country'];
                $this->study_process = $_POST['study_process'];
                $this->evaluation = $_POST['evaluation'];
                $this->study_type = $_POST['study_type'];
                $this->diploma_recognition = $_POST['diploma_recognition'];
                $this->diploma_type = $_POST['diploma_type'];
                $this->cel = $_POST['cel'];
                $this->address = $_POST['address'];
                $this->living_area = $_POST['living_area'];
                $this->living_city = $_POST['living_city'];
                $this->living_country = $_POST['living_country'];
                $this->release_country = $_POST['release_country'];
                $this->release_date = $_POST['release_date'];
                $this->ID_num = $_POST['ID_num'];
                $this->identification = $_POST['identification'];
                $this->birth_date = $_POST['birth_date'];
                $this->birth_city = $_POST['birth_city'];
                $this->birth_country = $_POST['birth_country'];
                $this->comment = $_POST['comment'];
            }else{
                if($_POST['submit-form'] == 'draft'){
                    $_POST['status'] = 'draft';
                }else {
                    $_POST['status'] = 'submitted';
                }
                unset($_POST['submit-form']);
                $_POST['user_id'] = $_SESSION['id'];
                foreach($this->files as $key => $file){
                    $hashed_name = uniqid() .$file["name"];
                    $didUpload = move_uploaded_file($file["tmp_name"], BASE_URL. 'assets\uploads\\' .$hashed_name);
                    if (!$didUpload) {
                        $this->errors['upload'] = 'An error occurred. Please contact the administrator.';
                    }
                    $this->files[$key] = $hashed_name;
                }
                
                $form_id = $this->db->create(self::$table, $_POST, null);
                $this->files['form_id'] = $form_id;
                $this->db->create(self::$files_table, $this->files, null);
                header('location: profile.php');
            }
        }
    }

    function allFormsByStatus($status){
        $all_forms = array();
        $complete_form = array();

        $forms = $this->db->select(self::$table, ['status' => $status]);
        foreach($forms as $key => $form){
            $form = $this->db->select(self::$files_table, ['form_id' => $form[0]]);
            $complete_form['data'] = $forms[$key];
            $complete_form['files'] = $form;
            $all_forms[$key] = $complete_form;
        }
        return $all_forms;
    }

    function getFormPreview($id){
        $complete_form = array();
        $form = $this->db->select(self::$table, ['id' => $id])[0];
        if(empty($form)){
            return [];
        }
        $files = $this->db->select(self::$files_table, ['form_id' => $form[0]])[0];

        $complete_form['data'] = $form;
        $complete_form['files'] = $files;
        
        return $complete_form;
    }

    function getFormsByStatus($status){
        $all_forms = array();
        $complete_form = array();

        $forms = $this->db->select(self::$table, 
        [
            'user_id' => $_SESSION['id'],
            'status' => $status
        ]);
        if(empty($forms)){
            return [];
        }

        foreach($forms as $key => $form){
            $form = $this->db->select(self::$files_table, ['form_id' => $form[0]]);
            $complete_form['data'] = $forms[$key];
            $complete_form['files'] = $form;
            $all_forms[$key] = $complete_form;
        }
        return $all_forms;
    }

    function AdminCheckedForm($id){
        $effected_rows = $this->db->update(self::$table, $id, 
        [
            'status'=> 'checked',
            'created_at' => '' // current time
        ]);
        if($effected_rows)
            header('location: dashboard.php');
        else
            $this->errors['checked'] = 'Form doesnt exist';
            return;
    }

    function getErrors($field){
        if(isset($this->errors[$field]))
            return $this->errors[$field];
        return null;
    }

    function setErrors($errors){
        $this->errors = $errors;
    }   

    function setFiles($files){
        $this->files = $files;
    } 

    function getFiles($field){
        if(isset($this->files[$field]))
            return $this->files[$field]['name'];
        return null;
    }
}
?>