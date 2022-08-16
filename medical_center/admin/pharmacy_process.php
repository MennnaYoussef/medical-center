<?php
require_once('../includes/pdo.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['remove']) &&isset($_POST['id']) ){
    $sql = "DELETE FROM pharmacy WHERE id=:id";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array(
      'id'=>$_POST['id'],
    ));
    if($count>0){
      $_SESSION['success']="Medicine Deleted From list";
      header('location:pharmacy.php');
      return;
     }
  }
  if(isset($_POST['submit']) &&isset($_POST['name']) &&!empty($_POST['name'])){
    $sql = "INSERT INTO pharmacy (name,found) values(:name,:found)";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array(
      'name'=>$_POST['name'],
      'found'=>'1'
    ));
    if($count>0){
      $_SESSION['success']="Medicine added to list";
      header('location:pharmacy.php');
      return;
     }
  }

 else if(isset($_POST['add'])&&isset($_POST['id']))
  {
    $sql = "UPDATE pharmacy SET found=:found WHERE id=:id";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array(
      'found'=>'1',
      'id'=>$_POST['id']
    ));

    if($count>0){
      $_SESSION['success']="Medicine added to list";
      header('location:pharmacy.php');
      return;
     }
     else{
       $_SESSION['error']="There is a problem, please try again";
       header('location:pharmacy.php');
       return;
     }
   }
   else if(isset($_POST['delete'])&&isset($_POST['id']))
    {
      $sql = "UPDATE pharmacy SET found=:found WHERE id=:id";
      $stmt=$db->prepare($sql);
      $count=$stmt->execute(array(
        'found'=>"0",
        'id'=>$_POST['id']
      ));

      if($count>0){
        $_SESSION['success']="Medicine deleted from list";
        header('location:pharmacy.php');
        return;
       }
       else{
         $_SESSION['error']="There is a problem, please try again";
         header('location:pharmacy.php');
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
