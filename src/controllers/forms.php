<?php

require(BASE_URL. 'helpers\validation\create-form.php');

class FormController{
    private static $table = 'forms';
    private static $files_table = 'files';
    private static $reject_forms = 'reject';
    private static $standBy_forms = 'standby';
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

    function create($id){
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
                    $hashed_name = uniqid();
                    $didUpload = move_uploaded_file($file["tmp_name"], BASE_URL. 'assets\uploads\\' .$hashed_name);
                    if (!$didUpload) {
                        $this->errors['upload'] = 'An error occurred. Please contact the administrator.';
                    }
                    $this->files[$key] = $hashed_name;
                }
                
                if($id == null){
                    $form_id = $this->db->create(self::$table, $this->data, null);
                    $this->files['id'] = $form_id;
                    $this->db->create(self::$files_table, $this->files, null);
                }else{
                    $effected_rows = $this->db->update(self::$table, $id, $this->data);
                    if($effected_rows){
                        $this->db->update(self::$files_table, $id, $this->files);
                    }
                    else
                        $this->errors['checked'] = 'Form doesnt exist';
                }
                
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
        $forms = $this->db->JoinedSelection(self::$table, self::$files_table, ['status' => $status]);
        return $forms;

    }

    function getFormPreview($id){
        $form = $this->db->JoinedSelection(self::$table, self::$files_table, 
        [
            'forms.id' => $id        
        ]);
        if(empty($form)){
            return null;
        }
        return $form[0];
    }

    function getFormsByStatus($status){
        $forms = $this->db->JoinedSelection(self::$table, self::$files_table, 
        [
            'user_id' => $_SESSION['id'],
            'status' => $status
        ]);
        return $forms;
    }

    function AdminCheckedForm($id, $university, $department){
        $t=time();
        $effected_rows = $this->db->update(self::$table, $id, 
        [
            'status'=> 'checked',
            'created_at' => date("Y-m-d",$t),
            'equivalent_university' => $university,
            'equivalent_department' => $department
        ]);
        if($effected_rows)
            header('location: dashboard.php');
        else
            $this->errors['checked'] = 'Form doesnt exist';
            return;
    }

    function AdminRejectForm($id, $reasons, $comment){
        $effected_rows = $this->db->create(self::$reject_forms,
        [
            'id' =>  $id,
            'reasons' => $reasons,
            'comment' => $comment
        ], null);
        if(!$effected_rows){
            $this->errors['reject'] = 'Form doesnt exist';
            return;
        }
        $t=time();
        $effected_rows = $this->db->update(self::$table, $id, 
        [
            'status'=> 'rejected',
            'created_at' => date("Y-m-d",$t)
        ]);
        if($effected_rows)
            header('location: dashboard.php');
        else{
            $this->errors['rejected'] = 'Form doesnt exist';
            return;
        }
    }

    function AdminStandByForm($id, $classes, $department){
        $effected_rows = $this->db->create(self::$standBy_forms,
        [
            'id' =>  $id,
            'classes' => $classes,
            'department' => $department
        ], null);
        if(!$effected_rows){
            $this->errors['standBy'] = 'Form doesnt exist';
            return;
        }
        $t=time();
        $effected_rows = $this->db->update(self::$table, $id, 
        [
            'status'=> 'standBy',
            'created_at' => date("Y-m-d",$t)
        ]);
        if($effected_rows)
            header('location: dashboard.php');
        else{
            $this->errors['standBy'] = 'Form doesnt exist';
            return;
        }
    }

    function getRejectReassons($id){
        return $this->db->select(self::$reject_forms, [ 'id' =>  $id ])[0];
    }

    function getStandByReasons($id){
        return $this->db->select(self::$standBy_forms, [ 'id' =>  $id ])[0];
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