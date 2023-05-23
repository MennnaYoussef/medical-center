<?php
include 'pdo.php';
?>
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
                          <li><a href="patient.php" class="smoothScroll">Home</a></li>
                         <li><a href="#" class="nav-link  dropdown-toggle" data-toggle="dropdown">Clinics  <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                             <?php foreach ($rows as $row): ?>
                                  <li><a class="dropdown-item" href="clinic.php?clinic=<?php echo $row['id'];?>"> <?php echo $row['name']; ?></a></li>
                                <?php endforeach; ?>
                                  <!-- <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li> -->
                          </ul>
                        </li>
                     </ul>
                     <ul class="nav navbar-nav navbar-right">
                       <li><a href="setting.php"> <span class="fas fa-sign-in-alt fa-lg"></span>Setting</a></li>
                     <li><a href="logout.php"> <span class="fas fa-sign-in-alt fa-lg"></span>Log out</a></li>
                     </ul>
                </div>

           </div>
      </section>
