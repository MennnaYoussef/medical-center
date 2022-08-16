<?php
include 'includes/header.php';
session_start();
$name=$mobile=$age="";
if(isset($_POST['index'])&&$_POST['index']=='1'){
  if(isset($_POST['name'])&&!empty($_POST['name']) ){
    $name=$_POST['name'];
  }
  if(isset($_POST['age'])&&!empty($_POST['age'])){
    $age=$_POST['age'];
  }
  if(isset($_POST['mobile'])&&!empty($_POST['mobile'])){
    $mobile=$_POST['mobile'];
  }
}
?>

<body>
<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">

<h1 class="text-center text-success">Sign up</h1>
<br/>
<?php
if (isset($_SESSION['error'])) {
    echo('<p style="color: red;">' . $_SESSION['error'] . "</p>\n");
    unset($_SESSION['error']);
   }
 ?>
<div class="col-sm-12">

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">

<form action="signup_process.php" method="POST">
  <div class="form-group">
    <label for="UserName">Name:</label>
    <input type="text" class="form-control" id="email" name="name" value="<?php echo $name ?>">
  </div>
  <div class="form-group">
    <label for="UserName">Age:</label>
    <input type="text" class="form-control" id="email" name="age"value="<?php echo $age ?>">
  </div>
  <div class="form-group">
    <label for="UserName">Mobile:</label>
    <input type="tel" class="form-control" id="email" name="mobile" value="<?php echo $mobile ?>">
  </div>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
  </div>

  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" name="confirmPassword">
  </div>

<button type="submit" class="btn btn-block  btn-success" name="submit">Submit</button>

</form>
<br/>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
