<?php
require_once('includes/pdo.php');
session_start();
if(isset($_POST['submit'])){

  if(isset($_POST['admin']) ){
    $sql="update admin SET password=:password where id=:id";
    $stmt=$db->prepare($sql);
    $stmt->execute(array('password'=>$_POST["password"],'id'=>$_SESSION["id"]));
    $_SESSION['password']=$_POST["password"]; //now you always refresh your data step by step
    header('location:admin.php');
    return;
  }
  else if($_SESSION['type']=="patient"){

if(isset($_POST['name'])&& !empty($_POST['name'])){
  $sql="update patient SET name=:name where id=:id";
  $stmt=$db->prepare($sql);
  $stmt->execute(array('name'=>$_POST["name"],'id'=>$_SESSION["id"]));
  // $_SESSION['name']=$_POST["name"]; //now you always refresh your data step by step
}
 if(isset($_POST['age'])&& !empty($_POST['age'])){
  $sql="update patient SET age=:age where id=:id";
  $stmt=$db->prepare($sql);
  $stmt->execute(array('age'=>$_POST["age"],'id'=>$_SESSION["id"]));
// $_SESSION['age']=$_POST["age"]; //now you always refresh your data step by step
}
if(isset($_POST['password'])&& !empty($_POST['password'])){

  $sql="update patient SET password=:passsword where id=:id";
  $stmt=$db->prepare($sql);
  $stmt->execute(array('passsword'=>$_POST["password"],'id'=>$_SESSION["id"]));
  // $_SESSION['password']=$_POST["password"];
}
  if(isset($_POST['mobile'])&& !empty($_POST['mobile']) ){
    $sql="update patient SET mobile=:mobile where id=:id";
    $stmt=$db->prepare($sql);
    $stmt->execute(array('mobile'=>$_POST["mobile"],'id'=>$_SESSION["id"]));
    // $_SESSION['mobile_number']=$_POST["phone"]; //now you always refresh your data step by step
  }
  if(isset($_POST['email'])&& !empty($_POST['email']) ){
    $sql="update patient SET email=:email where id=:id";
    $stmt=$db->prepare($sql);
    $stmt->execute(array('email'=>$_POST["email"],'id'=>$_SESSION["id"]));
    // $_SESSION['mobile_number']=$_POST["phone"]; //now you always refresh your data step by step
  }
    // if($_SESSION['is_admin']=="true"){
    //   $_SESSION['is_admin']="false";
    //   header('location:admin.php');
    // }
    // else{
    // header('location:second page.php');
    // return;
    // }
  }
  else if($_SESSION['type']=="doctor"){
    if(isset($_POST['password'])&& !empty($_POST['password'])){
      $sql="update doctor SET password=:passsword where id=:id";
      $stmt=$db->prepare($sql);
      $stmt->execute(array('passsword'=>$_POST["password"],'id'=>$_SESSION["id"]));
      // $_SESSION['password']=$_POST["password"];
    }
  }
  $_SESSION['success']="Data are updated";
  header('location:setting.php');
  return;

}

?>
