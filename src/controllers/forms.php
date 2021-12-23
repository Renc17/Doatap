<?php
include 'database/database.php';
include 'helpers/validation/create-form.php';

class Forms{
    private static $table = 'forms';
    private $db = null;

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


    
}



?>