<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();

include "includes/doctor_header.php";
if(!$_SESSION['type']=="doctor"){
  header('location:login_form.php');
  session_destroy();
}
else {
  if(isset($_GET['room'])){
    $_SESSION['room_id']=$_GET['room'];
    $stmt=$db->prepare("SELECT * from patient_room where room_id=:id order by date ");
    $stmt->execute(array('id'=>$_SESSION['room_id']));
    $patients=$stmt->fetchAll(PDO::FETCH_ASSOC);

  }
}
 ?>
    <div class="sections">

          <div class="container">
            <div class="row">

                <div class="col-xl-9">

                    <div class="servicetable">
                      <table class="table">

                        <thead>

                          <tr>
                                <th scope="col">code</th>
                                <th scope="col">Name</th>
                                <th scope="col">age</th>
                                <th scope="col">operation</th>
                            </tr>
                          </thead>



                          <?php if(sizeof($patients)>0): ?>
                            <?php $cnt=1; ?>
                      <?php foreach ($patients as $patient): ?>
                        <?php
                            $stmt=$db->prepare("SELECT * from patient where id=:id");
                            $stmt->execute(array('id'=>$patient['patient_id']));
                            $p=$stmt->fetch(PDO::FETCH_ASSOC);
                           ?>
                          <tbody>
                            <tr>
                              <th scope="row"><?php echo $cnt++?></th>
                              <td> <a href="doctor_patient.php?patient=<?php echo $patient['patient_id']; ?>"><?php echo $p['name'];?><a></td>
                                <td><?php echo $p['age']; ?></td>
                                <form action="room_process.php" method="post">
                                  <td><button class="btn btn-success"type="submit" name="button">Confirm</button>  </td>
                                  <input type="hidden" name="patient" value="<?php echo $patient['patient_id'] ?>">
                                  <input type="hidden" name="room" value="<?php echo $_GET['room'] ?>">
                                </form>
                            </tr>
                          </tbody>
                          <?php endforeach; ?>

                        <?php endif; ?>


                    </table>

                  </div>

                </div>

              </div>

            </div>
          </div>

       <script src="js/jquery.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/owl.carousel.min.js"></script>
       <script src="js/smoothscroll.js"></script>
       <script src="js/custom.js"></script>

  </body>
  </html>
