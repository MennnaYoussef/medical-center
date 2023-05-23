<?php
session_start();

if(!isset($_SESSION["id"]) ||!isset($_SESSION["type"])){
      header('location:index.php');
   }

if(isset($_SESSION['type'])&& $_SESSION['type']=="patient"){
include 'includes/patient_header.php';

$sql="select * from patient where id=:id";
$stmtselect=$db->prepare($sql);
$stmtselect->setFetchMode(PDO::FETCH_ASSOC);
$stmtselect->execute(array('id'=>$_SESSION['id']));
$row=$stmtselect->fetch();
$name=$row['name'];
$age=$row['age'];
$mobile=$row['mobile'];
$email=$row['email'];
$password=$row['password'];

$stmt=$db->prepare("SELECT * FROM clinic");
$stmt->execute();
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
}
else if(isset($_SESSION['type'])&& $_SESSION['type']=="doctor"){
include 'includes/doctor_header.php';
$sql="select * from doctor where id=:id";
$stmtselect=$db->prepare($sql);
$stmtselect->setFetchMode(PDO::FETCH_ASSOC);
$stmtselect->execute(array('id'=>$_SESSION['id']));
$row=$stmtselect->fetch();
}

?>

 <body>
 <div class="container" style="margin-top: 5%;">
   <div class="row">
     <div class="col-sm-4"> </div>
 <div class="col-md-4">

 <h2 class="text-center text-success">Update data</h2>
 <?php
 if (isset($_SESSION['success'])) {
     echo('<p style="color: green;">' . $_SESSION['success'] . "</p>\n");
     unset($_SESSION['success']);
    }
  ?>
 <br/>

 <div class="col-sm-12">

   <div class="tab-content">
     <div id="home" class="tab-pane fade in active">

<?php if ($_SESSION["type"]=="patient"): ?>

<form action="setting_process.php" method="POST">
  <div class="form-group">
    <label >Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
  </div>
  <div class="form-group">
    <label>Age:</label>
    <input type="text" class="form-control" id="email" name="age" value="<?php echo $age; ?>">
  </div>
  <div class="form-group">
    <label for="UserName">Mobile:</label>
  
    <input type="text" class="form-control" id="email" name="mobile" value="<?php echo $row['mobile']; ?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control"  value="<?php echo $email; ?>" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
<button type="submit" class="btn btn-block  btn-success" name="submit">Update</button>

</form>
<?php else : ?>
  <form  action="setting_process.php" method="post">
  <div class="form-group">
    <label for="pwd">Change password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>
<button type="submit" class="btn btn-block  btn-success" name="submit">Update</button>
</form>

<?php endif; ?>


<br/>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
