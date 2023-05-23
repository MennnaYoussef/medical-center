<?php
session_start();
include 'includes/pdo.php';
if(!isset($_SESSION['id'])){
  header('location:index.php');
  return;
}
if(!isset($_POST['time'])){
$_SESSION['error']="Please choose date that you want to reserve";
  header('location:clinic.php?clinic='.$_GET['clinic']);
  return;
}

$stmt=$db->prepare("SELECT * from patient_room where patient_id=:pid AND room_id=:rid");
$stmt->execute(array('pid'=>$_SESSION['id'],'rid'=>$_POST['time']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$row){
$stmt=$db->prepare("INSERT into patient_room (patient_id,room_id) values(:pid,:rid)");
$stmt->execute(array('pid'=>$_SESSION['id'],'rid'=>$_POST['time']));

$_SESSION['clinic']=$_GET['clinic'];
header('location:clinic.php?clinic='.$_GET['clinic']);
return;
}
else {
  $_SESSION['message']="1";
  header('location:clinic.php?clinic='.$_GET['clinic']);
  return;
}
 ?>
