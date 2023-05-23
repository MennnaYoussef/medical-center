<?php
require_once('../includes/pdo.php');
session_start();
 ?>
 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['email'])&&isset($_POST['email'])&&isset($_POST['title'])&&isset($_POST['specialization']))
  {
    $email=test_input($_POST['email']); //test_input to make sure that input is good
    $name=test_input($_POST['name']);
    $title=test_input($_POST['title']);
    $specialization=test_input($_POST['specialization']);

    $sql = "insert into doctor (name,email,title,specialization,password) values (:name,:email,:title,:specialization,:password)";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array('name'=>$name,'email'=>$email,'title'=>$title,'specialization'=>$specialization,'password'=>$name));

    if($count>0){
      $_SESSION['success']="Doctor added to system";
      header('location:index.php');
      return;
     }
     else{
       $_SESSION['error']="There is a problem, please try again";
       header('location:index.php');
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
