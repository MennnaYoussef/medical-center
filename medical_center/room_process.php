<?php
require_once('includes/pdo.php');
session_start();
 ?>
 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if(isset($_POST['patient'])&&isset($_POST['room']) )
  {
    $sql = "DELETE from patient_room where patient_id=:patient AND room_id=:room";
    $stmtselect=$db->prepare($sql);
    $stmtselect->execute(array('patient'=>$_POST['patient'],'room'=>$_POST['room']));
    // $row=$stmtselect->fetch(PDO::FETCH_ASSOC);
    // $count = $stmtselect->rowCount();


      header('location:doctor_room.php?room='.$_POST['room']);
      return ;
      }
}

?>
