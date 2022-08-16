<?php
require_once('../includes/pdo.php');
session_start();
 ?>
 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['doctor'])&&isset($_POST['date'])&&isset($_POST['day'])&&isset($_POST['time']))
  {
    $doctor=test_input($_POST['doctor']); //test_input to make sure that input is good
    $date=test_input($_POST['date']);
    $day=test_input($_POST['day']);
    $time=test_input($_POST['time']);
    $sql = "insert into room (doctor_id,date,time,day) values (:doctor,:date,:time,:day)";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array(
      'doctor'=>$doctor,
      'date'=>$date,
      'time'=>$time,
      'day'=>$day
    ));

    if($count>0){
      $_SESSION['success']="appointment added to system";
      header('location:schedule.php');
      return;
     }
     else{
       $_SESSION['error']="There is a problem, please try again";
       header('location:schedule.php');
       return;
     }
   }

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
