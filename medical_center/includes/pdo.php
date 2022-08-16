<?php
$db_user = "root";
$db_pass = "";
$db_name = "medical_center";
$db = new PDO('mysql:host=localhost;port=3306;dbname=medical_center', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
