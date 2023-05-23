<?php
include 'includes/header.php';
session_start();
?>
<body>
<div class="container" style="margin-top: 5%;">
  <div class="row">
    <div class="col-sm-4"> </div>
<div class="col-md-4">
<!-- <h1 class="text-center text-success">Log in</h1> -->
<br/>

<div class="col-sm-12">
  <ul class="nav nav-pills" >
    <li  style="width:48%"><a class=" btn btn-lg btn-default" data-toggle="tab" href="#patient">Patient</a></li>
    <li  style="width:50%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#doctor">Doctor</a></li>
  </ul>
<br/>


  <div class="tab-content">
    <div id="doctor" class="tab-pane fade">
<form action="doctor_process.php" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input name="email" type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name="password"type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-success">Submit</button>
  <!-- <button type="hidden" name="type" value="doctor"></button> -->
  <!-- <button type="submit" class=" pull-right btn-link"><a href="www.google.com">Forget password</a></button> -->
</form>
<br/>
<!-- <a href="#" class="pull-right btn btn-block btn-danger" > Already Register ?   </a> -->


    </div>

    <div id="patient" class="tab-pane fade in active">
      <?php
      if (isset($_SESSION['error'])) {
          echo('<p style="color: red;">' . $_SESSION['error'] . "</p>\n");
          unset($_SESSION['error']);
         }
        else if (isset($_SESSION['success'])) {
             echo('<p style="color: green;">' . $_SESSION['success'] . "</p>\n");
             unset($_SESSION['success']);
            }

       ?>
<form action="patient_process.php" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input name="email" type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input name="password" type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <!-- <button type="hidden" name="type" value="patient"></button> -->

  <!-- <button type="submit" class=" pull-right btn-link"><a href="www.google.com">Forget password</a></button> -->
</form>
<br/>
<a href="signup_form.php" class="pull-right btn btn-block btn-primary" > Sign up   </br></a>
    </div>
   </div>
  </div>
</div>
</div>
</body>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>
