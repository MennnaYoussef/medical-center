<?php
session_start();

 if(isset($_SESSION['message'])){
   echo '<script>alert("You have already registered for this clinic")</script>';
  unset($_SESSION['message']);
}

if(isset($_SESSION["type"])&&$_SESSION["type"]=="doctor"){
    header("location:doctor.php");
    return;
}

if(isset($_SESSION["id"]) && $_SESSION['type']=="patient"){
  include 'includes/patient_header.php';
  $check=0;
}
else{
include 'includes/pdo.php';
  $check=1;
}
if(isset($_SESSION["clinic"])){
  $_GET['clinic']=$_SESSION['clinic'];
}
$stmt=$db->prepare("SELECT name from clinic where id=:id");
$stmt->execute(array('id'=>$_GET['clinic']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
// GET ALL DOCTORS FOR SPECIFIC CLINIC
$stmt=$db->prepare("SELECT id,name from doctor where specialization=:id");
$stmt->execute(array('id'=>$_GET['clinic']));
$doctors=$stmt->fetchALL(PDO::FETCH_ASSOC);
?>
<?php if ($check==1): ?>

  <?php
    $stmt=$db->prepare("SELECT * FROM clinic");
    $stmt->execute();
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
        <title>Medical center</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/doctor.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="css/templatemo-style.css">

   </head>
   <body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

        <!-- PRE LOADER -->
        <section class="preloader">
             <div class="spinner">

                  <span class="spinner-rotate"></span>

             </div>
        </section>
        <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
             <div class="container">

                  <div class="navbar-header">
                       <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon icon-bar"></span>
                            <span class="icon icon-bar"></span>
                            <span class="icon icon-bar"></span>
                       </button>
                       <!-- lOGO TEXT HERE -->
                       <a href="#" class="navbar-brand">Medical center</a>
                  </div>

                  <!-- MENU LINKS -->
                  <div class="collapse navbar-collapse">
                       <ul class="nav navbar-nav navbar-nav-first">
                            <li><a href="index.php" class="smoothScroll">Home</a></li>
                            <li><a href="#" class="nav-link  dropdown-toggle" data-toggle="dropdown">Clinics  <span class="caret"></span></a>
                                 <ul class="dropdown-menu">
                                   <?php foreach ($rows as $row): ?>
                                        <li><a class="dropdown-item" href="clinic.php?clinic=<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></a></li>
                                      <?php endforeach; ?>
                                        <!-- <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li> -->
                                </ul>
                            </li>
                          
                       </ul>
                       <ul class="nav navbar-nav navbar-right">
                       <li><a href="login_form.php"> <span class="fas fa-sign-in-alt fa-lg"></span>Log in</a></li>
                       </ul>
                  </div>

             </div>
        </section>
        <?php endif; ?>

     <!-- Courses -->
     <section id="courses">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2><?php echo $row['name'];?><small>Choose your doctor</small></h2>
                              <?php  if (isset($_SESSION['error'])) {
                                   echo('<p style="color: red;">' . $_SESSION['error'] . "</p>\n");
                                   unset($_SESSION['error']);
                                  }
                              ?>

                         </div>
                         <div class="owl-carousel owl-theme owl-courses">
                           <?php foreach ($doctors as $doctor): ?>
<!--                             LOOP TO GET MORE OF THAT -->
                                  <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="courses-thumb">
                                          <?php if (!$check): ?>
                                          <form  action="reserve.php?clinic=<?php echo $_GET['clinic'];?>" method="POST">
                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                       <img src="images/courses-image1.jpg" class="img-responsive" alt="">
                                                  </div>
                                                  <div class="courses-date">
<!--                                         <span><i class="fa fa-calendar"></i> 12 / 7 / 2018</span>-->
<!--                                                       <span><i class="fa fa-clock-o"></i>From: 7 am</span>-->
<!--                                                       <span>To: 9 am</span>-->
                                                  </div>
                                             </div>

                                             <div class="courses-detail">
                                                  <h3><?php echo $doctor['name']; ?></h3>

                                             </div>
                                              <!-- GET ALL ROOMS FOR SPECIFIC DOCTOR -->
                                            <?php
                                            $stmt=$db->prepare("SELECT * from room where doctor_id=:doc order by date");
                                            $stmt->execute(array('doc'=>$doctor['id']));
                                            $rooms=$stmt->fetchALL(PDO::FETCH_ASSOC);
                                             ?>
                                             <?php if ($rooms): ?>

                                             <?php foreach ($rooms as $room): ?>
                                               <?php $date2=date("Y-m-d"); ?>
                                               <?php if ($room['date']>$date2): ?>
                                             <div class="courses-info">
                                                <div class="form-group"><b>Date: </b> <?php echo $room['date']; ?></div>
                    <input type="radio" id="male" name="time" value="<?php echo $room['id']; ?>"> <span><b><?php echo $room['day'].": " ;?></b><?php echo $room['time']; ?> </span>
                                            </div>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                            <div class="courses-info text-center">
                                                <button class="btn btn-success" id="reserve">Reserve</button>
                                            </div>
                                            <?php else: ?>
                                              <?php  echo('<p style="color: red;">' . "There is no schedule " . "</p>\n");?>
                                        <?php endif; ?>
                                          </form>

                                          <?php else: ?>

                                          <form  action="login_form.php" method="POST">

                                             <div class="courses-top">
                                                  <div class="courses-image">
                                                       <img src="images/courses-image1.jpg" class="img-responsive" alt="">
                                                  </div>
                                                  <div class="courses-date">
<!--                                         <span><i class="fa fa-calendar"></i> 12 / 7 / 2018</span>-->
<!--                                                       <span><i class="fa fa-clock-o"></i>From: 7 am</span>-->
<!--                                                       <span>To: 9 am</span>-->
                                                  </div>
                                             </div>

                                             <div class="courses-detail">
                                                  <h3><?php echo $doctor['name']; ?></h3>

                                             </div>
                                              <!-- GET ALL ROOMS FOR SPECIFIC DOCTOR -->
                                            <?php
                                            $stmt=$db->prepare("SELECT * from room where doctor_id=:doc order by date");
                                            $stmt->execute(array('doc'=>$doctor['id']));
                                            $rooms=$stmt->fetchALL(PDO::FETCH_ASSOC);
                                             ?>
                                             <?php if ($rooms): ?>
                                             <?php foreach ($rooms as $room): ?>
                                               <?php $date2=date("Y-m-d"); ?>
                                               <?php if ($room['date']>$date2): ?>
                                             <div class="courses-info">
                                                <div class="form-group"><b>Date: </b> <?php echo $room['date']; ?></div>
                    <input type="radio" id="male" name="time" value="<?php echo $room['id']; ?>"> <span><b><?php echo $room['day'].": " ;?></b><?php echo $room['time']; ?> </span>
                                            </div>
                                             <?php endif; ?>
                                          <?php endforeach; ?>
                                            <div class="courses-info text-center">
                                                <button class="btn btn-success" id="reserve">Reserve</button>
                                            </div>
                                          <?php else: ?>
                                            <?php  echo('<p style="color: red;">' . "There is no schedule " . "</p>\n");?>
                                      <?php endif; ?>
                                          </form>
                                            <?php endif; ?>
                                    </div>

                                   </div>
                              </div>
                              <?php endforeach; ?>
<!--                             END OF LOOP-->

                         </div>

               </div>
          </div>
     </section>



     <?php
     include 'includes/footer.php';
     ?>
