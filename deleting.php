<?php
 require_once "includes/autoloader.php";
// deleting operation

if($_POST['action']==='delete'){
    $process = new Process();
    $all_id = $_POST['id'];
    $delete = $process->deleteAppointment($all_id);

}

?>
