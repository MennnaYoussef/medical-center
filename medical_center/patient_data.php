<?php
require_once('includes/pdo.php');
session_start();
 ?>
 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['date'])&&isset($_POST['diagnosis'])&&isset($_POST['medicine'])&&isset($_POST['confirm']))
  {
    if(!empty($_POST['date'])&&!empty($_POST['diagnosis'])&&!empty($_POST['medicine'])){
    $date=test_input($_POST['date']); //test_input to make sure that input is good
    $diagnosis=test_input($_POST['diagnosis']);
    $medicine=test_input($_POST['medicine']);

    $sql = "insert into doctor_patient(doctor_id,patient_id,diagnosis,medicine,date) values (:doctor_id,:patient_id,:diagnosis,:medicine,:date)";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array('doctor_id'=>$_SESSION['id'],'patient_id'=>$_POST['patient'],
    'diagnosis'=>$diagnosis,'medicine'=>$medicine,'date'=>$date));
    if($count>0){
      $_SESSION['good']="Diagnosis is submitted";
      header('location:doctor_patient.php?patient='.$_POST['patient']);
      return;
     }
     else{
       $_SESSION['not_good']="There is a problem, please try again";
        header('location:doctor_patient.php?patient='.$_POST['patient']);
       return;
     }
   }
   else{
     $_SESSION['not_good']="Please fill all of this out";
      header('location:doctor_patient.php?patient='.$_POST['patient']);
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
