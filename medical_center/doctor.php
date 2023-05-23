<?php
session_start();
include "includes/doctor_header.php";
if(!$_SESSION['type']=="doctor" && !isset($_SESSION['id'])){
  header('location:login_form.php');
  session_destroy();
}
$stmt=$db->prepare("SELECT * from doctor where id=:id");
$stmt->execute(array('id'=>$_SESSION['id']));
$doctor=$stmt->fetch(PDO::FETCH_ASSOC);

$stmt=$db->prepare("SELECT * from room where doctor_id=:id order by date");
$stmt->execute(array('id'=>$_SESSION['id']));
$rooms=$stmt->fetchAll(PDO::FETCH_ASSOC);

 ?>
     <!-- Courses -->
     <section id="courses">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Choose a room</h2>
                         </div>
                         <div class="owl-carousel owl-theme owl-courses">
                           <?php foreach ($rooms as $room): ?>

                             <?php $date2=date("Y-m-d"); ?>

                              <?php if ($room['date']>$date2): ?>
                                
                                  <div class="col-md-4 col-sm-4">
                                   <div class="item">
                                        <div class="courses-thumb">
                                          <form  action="doctor_room.php?room=<?php echo $room['id'];?>" method="POST">
                                             <div class="courses-detail">
                                                  <h3><?php echo $room['day']; ?></h3>
                                             </div>
                                              <!-- GET ALL ROOMS FOR SPECIFIC DOCTOR -->
                                            <div class="courses-info">
                                                <div class="form-group"><b>Date: </b> <?php echo $room['date']; ?></div>
                    <input type="radio" id="male" name="time" value="<?php echo $room['id']; ?>"> <span><b><?php echo $room['day'].": " ;?></b><?php echo $room['time']; ?> </span>
                                            </div>
                                            <div class="courses-info text-center">
                                                <button class="btn btn-primary" id="reserve">Enter</button>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                  </div>
                                             <?php endif; ?>
                              <?php endforeach; ?>
                         </div>

               </div>
          </div>
     </section>


     <?php
     include 'includes/footer.php';
     ?>
