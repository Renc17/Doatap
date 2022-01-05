<?php
include 'database/database.php';
include 'helpers/validation/create-form.php';

class FormController{
    private static $table = 'forms';
    private $db = null;

    private $errors = array();

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
    private $deploma_date = '';


    function __construct()
    {
        $this->db = new Database();
    }

    function create(){
        if(isset($_POST['submit-form'])){
            $user_validation = new CreateForm($_POST);
            $errors = $user_validation->validateForm();
        
            if(count($errors)){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
            }else{
                unset($_POST['register']);
                $this->db->create(self::$table, $_POST, null);
                header('location: profile.php');
            }
        }
    }

    function getErrors($field){
        if(isset($this->errors[$field]))
            return $this->errors[$field];
        return null;
    }


    
}



?>