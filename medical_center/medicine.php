<?php
session_start();
include 'includes/pdo.php';
if(isset($_POST['submit']) &&isset($_POST['name']) &&!empty($_POST['name'])){
  $stmt=$db->prepare("SELECT found from pharmacy where name=:name");
  $stmt->execute(array('name'=>$_POST['name']));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
  if($row){
    $_SESSION['success']='1';
    if(isset($_POST['patient'])){
      header('location:patient.php');
      return;
    }
    header('location:doctor_patient.php');
    return;
  }
  else{
    $_SESSION['success']='0';
    if(isset($_POST['patient'])){
      header('location:patient.php');
      return;
    }
    header('location:doctor_patient.php');
    return;
  }
}
?>
