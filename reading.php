<?php
 require_once "includes/autoloader.php";

// getting all the products

if($_GET['action'] === 'getAppointments'){
    $process = new Process();
    $getData = $process->getAllAppointments();
    echo json_encode($getData);
}

?>