<?php
 require_once "includes/autoloader.php";
class Process extends Database { 
    public function saveAppointment($data){

         $name = $data['name'];
         $lastName = $data['lastName'];
         $date = $data['date'];
         $time = $data['time'];
         $serviceType = $data['serviceType'];
         $email = $data['email'];
         $number = $data['number'];
         $msg = $data['msg'];

        $conn = $this->connect();
        mysqli_query($conn, "insert into ".$this->tbname."(
            name, lastName, date, time, serviceType, email, number, msg) 
            values('$name', '$lastName', '$date', '$time', '$serviceType', '$email', '$number', '$msg')") or die(
            mysqli_error($conn));
     }
    public function getAllAppointments(){
        $conn = $this->connect();
        $array =[];
        $result = mysqli_query($conn, "SELECT * FROM $this->tbname ORDER BY `date`");
        while($row = mysqli_fetch_assoc($result)){
            $array[] = $row;           
        }
        return $array;
     }
    public function deleteAppointment($all_id){

        $conn = $this->connect();
        $id = implode(',', $all_id);
        $result = mysqli_query($conn, "DELETE FROM $this->tbname WHERE id IN (".$id.")");
        if($result){
            return true;
        }else {
            return false;
                
        }
    }

    

}
?>