<?php
include 'includes/pdo.php';
session_start();
$name=$email=$message=$rate=" ";
if( isset($_POST['send'])){
  if( isset($_POST['name']) && !empty($_POST['name']) &&isset($_POST['title'])&&!empty($_POST['title'])&&isset($_POST['message'])&&!empty($_POST['message'])
  &&isset($_POST['rate']) &&!empty($_POST['rate']) )
    {

      $name=test_input($_POST['name']);
      $email=test_input($_POST['title']);
      $message=test_input($_POST['message']);
      $rate=test_input($_POST['rate']);
      try{
      $sql = "INSERT INTO reviews (name,title,message,rate,selected) VALUES (:name,:title,:message,:rate,:selected)";
      $stmtinsert=$db->prepare($sql);
      $result=$stmtinsert->execute( array(
        "name"=>$name,
        "title"=>$email,
        "message"=>$message,
        "rate"=>$rate,
        "selected"=>0
      ) );
      if($result){
        $_SESSION['success']="1";
        header("location:index.php");
        return;
      }
      else{
      throw new Exception("THERE Where Errors while saving data");}
      exit;
      }
      catch(Exception $e) {
      echo 'Message: ' .$e->getMessage()." ".$name." "." ".$email." ".$message." ".$rate;
    }

  }
  else {
    $_SESSION['error']="Please enter all data";
    header('location:index.php');
    return;
  }
}
else {
  echo "heelo";
}
// echo "string";
function test_input($data) {    // to remove any charachter and slashes for input that i get
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
