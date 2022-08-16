<?php
session_start();
require_once('../includes/pdo.php');

//Check For Email AND password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['email'])&&isset($_POST['password']) )
  {
    $email=test_input($_POST['email']);
    $password=test_input($_POST['password']);

    if(strlen($_POST['email'])<1||strlen($_POST['password'])<1)
    {
      $_SESSION['error']="Email and password are required";
      header("location:index.php");
      return;
    }
    //Checek in Database
    $sql = "select * from admin where email=:email AND password=:password";
    $stmt=$db->prepare($sql);
    $stmt->execute(array(
      'email'=>$_POST['email'],
      'password'=>$_POST['password']
    ));
    $admin= $stmt->fetch();

    if($admin>0){

        $sql = "select name from access where id=:id";
        $stmt=$db->prepare($sql);
        $stmt->execute(array(
          'id'=>$admin['access']
        ));
        $access=$stmt->fetch();

        $_SESSION["id"]=$admin["id"];

        if($access['name']=="managerial"){
          $_SESSION['type']='managerial';
          header('location:doctor.php');
        }
        else if($access['name']=="reviewers"){
          $_SESSION['type']='review';

          header('location:review.php');
        }
        else if($access['name']=="pharmacy"){
          $_SESSION['type']='pharmacy';
          header('location:pharmacy.php');
        }
        return;
    }
      else{ //IF NOT found
        $_SESSION["error"]="Email or password are incorrect";
        header('location:index.php');
       }
}
}

// function to clear input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
