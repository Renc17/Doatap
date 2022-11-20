<?php

require(BASE_URL. 'helpers\validation\payment-form.php');

class PaymentController{
    private $errors = array();
    private $data = array();

    function __construct(){
    }

    function create(){
        if(isset($_POST['payment'])){
            $form_validation = new MakePayment($_POST);
            $data = $form_validation->validateForm();

            $this->setErrors($data['errors']);
            $this->setData($data['data']);
        
            if(count($this->errors)){
                return;
            }
        }
    }

    function getErrors($field){
        if(isset($this->errors[$field]))
            return $this->errors[$field];
        return null;
    }

    function setErrors($errors){
        $this->errors = $errors;
    }   

    function setData($data){
        $this->data = $data;
    } 

    function getData($field){
        if(isset($this->data[$field]))
            return $this->data[$field];
        return null;
    }

    function hasErrors(){
        return count($this->errors);
    }
}
?>