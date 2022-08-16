<?php
include 'includes/pdo.php';
session_start();
$name=$age=$password=$mobile=$email=$confirm=" ";
if( isset($_POST['name']) && !empty($_POST['name']) &&isset($_POST['age'])&&!empty($_POST['age'])&&isset($_POST['mobile'])&&!empty($_POST['mobile'])&&isset($_POST['password'])
&&!empty($_POST['password'])&&isset($_POST['confirmPassword']) &&!empty($_POST['confirmPassword'])&&isset($_POST['email'])&&!empty($_POST['name']) )
  {
      if($_POST['password']==$_POST['confirmPassword']){
   //i can handle every input and put condition if there is problem with text or if its empty by php but i did it by html i put required
    $name=test_input($_POST['name']);
    $email=test_input($_POST['email']);
    $mobile=test_input($_POST['moblie']);
    $age=test_input($_POST['age']);
    $password=test_input($_POST['password']);
    try{                                            // for checking if there is error for email
    $sql = "insert into patient (name,age,mobile,email,password) values(?,?,?,?,?)";
    $stmtinsert=$db->prepare($sql);
    $result=$stmtinsert->execute([$name,$age,$mobile,$email,$password]);
    if($result){
    $_SESSION['success']="Your registration is completely successful";
    header('location:login_form.php');
    }
    else{ throw new Exception("THERE Where Errors while saving data");}
    exit;
    }
    catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }
  }
  else{
    $_SESSION['error']="Your Passwords isn't identical";
   header('location:signup_form.php');
   return;
  }
}
else {
  $_SESSION['error']="Please enter all members";
  header('location:signup_form.php');
  return;
}
function test_input($data) {    // to remove any charachter and slashes for input that i get
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
