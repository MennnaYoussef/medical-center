<?php
require_once('includes/pdo.php');
session_start();
 ?>
 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['email'])&&isset($_POST['password']) )
  {
    $email=test_input($_POST['email']); //test_input to make sure that input is good
    $password=test_input($_POST['password']);
    $sql = "select * from doctor where email=:email AND password=:password";
    $stmtselect=$db->prepare($sql);
    $stmtselect->execute(array('email'=>$_POST['email'],'password'=>$_POST['password']));
    $row=$stmtselect->fetch(PDO::FETCH_ASSOC);
    $count = $stmtselect->rowCount();
    if($count>0){
      $_SESSION["id"]=$row["id"];
      $_SESSION['type']="doctor";
      header('location:doctor.php');
      return ;
     }
     else{
       $_SESSION['error']="Email or password is wrong";
       header('location:login_form.php');
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
