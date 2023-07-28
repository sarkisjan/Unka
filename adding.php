<?php
 require_once "includes/autoloader.php";

if($_POST['action']==='insert'){
    $errors =[];


    $validation = new Validation();
    $errors = $validation -> validateForm($_POST);

    $process = new Process();

    if(empty($errors)){

        $process->saveAppointment($_POST); 
    }

    print_r(json_encode($errors)) ;

}


?>