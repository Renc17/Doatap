<?php

require(BASE_URL. 'helpers\validation\create-form.php');

class FormController{
    private static $table = 'forms';
    private static $files_table = 'files';
    private $db = null;

    private $errors = array();
    private $files = array();
    private $data = array();

    private $name = ''; 
    private $surname = '';
    private $amka = '';
    private $afm = '';
    private $email = '';

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

    function getAMKA(){
        return $this->amka;
    }

    function getAFM(){
        return $this->afm;
    }

    function getEmail(){
        return $this->email;
    }

    function create(){
        if(isset($_POST['submit-form'])){
            $form_validation = new CreateForm($_POST, $_FILES);
            $data = [];
            if($_POST['submit-form'] == 'register'){
                $data = $form_validation->validateForm();
            }else if($_POST['submit-form'] == 'draft'){
                $data = $form_validation->validateDraftForm();
            }

            $this->setErrors($data['errors']);
            $this->setFiles($data['files']);
            $this->setData($data['data']);
        
            if(count($this->errors)){
                return;
            }else{
                if($_POST['submit-form'] == 'draft'){
                    $this->data['status'] = 'drafted';
                }else {
                    $this->data['status'] = 'submitted';
                }
                unset($this->data['submit-form']);
                $this->data['user_id'] = $_SESSION['id'];
                foreach($this->files as $key => $file){
                    if($file["size"] == 0){
                        $this->files[$key] = null;
                        continue;
                    }
                    $hashed_name = uniqid() .$file["name"];
                    $didUpload = move_uploaded_file($file["tmp_name"], BASE_URL. 'assets\uploads\\' .$hashed_name);
                    if (!$didUpload) {
                        $this->errors['upload'] = 'An error occurred. Please contact the administrator.';
                    }
                    $this->files[$key] = $hashed_name;
                }
                
                $form_id = $this->db->create(self::$table, $this->data, null);
                $this->files['form_id'] = $form_id;
                $this->db->create(self::$files_table, $this->files, null);
                header('location: profile.php');
            }
        }
    }

    function deleteForm($id){
        $this->db->delete(self::$table, [
            'id' => $id,
            'user_id' => $_SESSION['id'],
        ]);
        return;
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
        $form = $this->db->select(self::$table, ['id' => $id]);
        if(empty($form)){
            return [];
        }
        $form = $form[0];
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

        // $this->db->JoinedSelection(self::$table, );
    }

    function AdminCheckedForm($id){
        $t=time();
        $effected_rows = $this->db->update(self::$table, $id, 
        [
            'status'=> 'checked',
            'updated_at' => date("Y-m-d",$t)
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

    function setData($data){
        $this->data = $data;
    } 

    function getFiles($field){
        if(isset($this->files[$field]))
            return $this->files[$field]['name'];
        return null;
    }

    function getData($field){
        if(isset($this->data[$field]))
            return $this->data[$field];
        return null;
    }
}
?>