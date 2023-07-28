<?php
 require_once "includes/autoloader.php";
class Validation extends Database {
    public $errors = [];
    public function validateForm($post){
        $fields = ['name', 'lastName', 'email', 'number','date', 'time', 'serviceType'];
            foreach($fields as $field) {
            if(!isset($post[$field])){
                trigger_error("$field is not present in data");
                }
            }

            $this->validateName($post);
            $this->validateLastName($post);
            $this->validateEmail($post);
            $this->validateNumber($post);
            $this->validateDate($post);
            $this->validateTime($post);
            $this->validateServiceType($post);
            $this->validateMsg($post);
    
            return $this->errors;
        }
    public function validateName($post){
        $val = trim($post['name']);


    if(empty($val)){
        $this->addError('name', 'Please, provide name');
    }
    
    }
    public function validateLastName($post){
        $val = trim($post['lastName']);
        if(empty($val)){
            $this->addError('lastName', 'Please, provide lastName');
        } 
    }
    public function validateEmail($post){
        $val = trim($post['email']);
        if(empty($val)){
            $this->addError('email', 'Please, provide e-mail');
        } 
    }
    public function validateServiceType($post){
        $val = trim($post['serviceType']);
        if(empty($val)){
            $this->addError('servicetype', 'Please, provide servicetype');
        }  
    }
    public function validateDate($post){
        $val = trim($post['date']);
        // $conn = $this->connect();
        // $res = mysqli_query($conn, "SELECT * FROM ".$this->tbname." WHERE date='".$val."'");
        // while($row = mysqli_fetch_assoc($res)){
        //     if (is_array($row) && count($row)>0){
        //         $this->addError('date', 'This date already exist');
        //     }
        // }
        if(empty($val)){
            $this->addError('date', 'Please, provide date');
        }  
    }
    public function validateTime($post){
        $val = trim($post['time']);
        $conn = $this->connect();
        $res = mysqli_query($conn, "SELECT * FROM ".$this->tbname." WHERE date='".$post['date']."'");
        while($row = mysqli_fetch_assoc($res)){
            if (is_array($row) && count($row)>0){
                $res2 = mysqli_query($conn, "SELECT * FROM ".$this->tbname." WHERE date='".$val."'");
                while($row2 = mysqli_fetch_assoc($res2)){
                    if (is_array($row2) && count($row2)>0){
                    $this->addError('time', 'there is appointment already in that time');
                }
        }

            }
        }
        if(empty($val)){
            $this->addError('time', 'Please, provide time');
        }  
    }
    public function validateNumber($post){
        $val = trim($post['number']);
        if(empty($val)){
            $this->addError('number', 'Please, provide number');
        }  
    }
    public function validateMsg($post){
        $val = trim($post['msg']);
        if(empty($val)){
            $this->addError('msg', 'Please, provide msg');
        }  
    }

    public function addError($key, $val){
        $this->errors[$key] = $val;
    }
               
    }
?>