<?php
require_once('../includes/pdo.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 if(isset($_POST['add'])&&isset($_POST['id']))
  {
    $sql = "UPDATE reviews SET selected=:selected WHERE id=:id";
    $stmt=$db->prepare($sql);
    $count=$stmt->execute(array(
      'selected'=>'1',
      'id'=>$_POST['id']
    ));

    if($count>0){
      $_SESSION['success']="Review added to list";
      header('location:review.php');
      return;
     }
     else{
       $_SESSION['error']="There is a problem, please try again";
       header('location:review.php');
       return;
     }
   }
   else if(isset($_POST['delete'])&&isset($_POST['id']))
    {
      $sql = "UPDATE reviews SET selected=:selected WHERE id=:id";
      $stmt=$db->prepare($sql);
      $count=$stmt->execute(array(
        'selected'=>"0",
        'id'=>$_POST['id']
      ));

      if($count>0){
        $_SESSION['success']="Review deleted from list";
        header('location:review.php');
        return;
       }
       else{
         $_SESSION['error']="There is a problem, please try again";
         header('location:review.php');
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
