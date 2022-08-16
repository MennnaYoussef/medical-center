<?php
  session_start();
  include "includes/doctor_header.php";

  if(isset($_SESSION['success'])){
  if($_SESSION['success']=='1'){
    echo '<script>alert("Medicine is found")</script>';
    }
    else{
      echo '<script>alert("Medicine Not found")</script>';
    }
      unset($_SESSION['success']);
  }
    if(isset($_GET['patient'])){
  $stmt=$db->prepare("SELECT * from patient where id=:id ");
  $stmt->execute(array('id'=>$_GET['patient']));
  $patient=$stmt->fetch(PDO::FETCH_ASSOC);
  }
  else {
      header('location:doctor_room.php');
  }

 ?>
 <?php
 $stmt=$db->prepare("SELECT *  FROM doctor_patient where patient_id=:id");
 $stmt->execute(array(
   'id'=>$_GET['patient'],
 ));
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
<!-- header -->


<!-- body -->
     <div class="container">

  <h2>Patient History</h2>
    <div class="patient-info">
  <div class="form-group">
       <label for="name"><b>Name : <?php echo $patient['name'];?></b></label>
     </div>
     <div class="form-group">
       <label for="age"><b>Age : <?php echo $patient['age']; ?></b></label>
     </div>
         </div>

         <?php
         if (isset($_SESSION['not_good'])) {
             echo('<p style="color: red;">' . $_SESSION['not_good'] . "</p>\n");
             unset($_SESSION['not_good']);
            }
            else if (isset($_SESSION['good'])) {
                echo('<p style="color: green;">' . $_SESSION['good'] . "</p>\n");
                unset($_SESSION['good']);
               }
          ?>
  <table class="table table-bordered">
      <thead>
      <tr>
          <th>clinic</th>
          <th>Doctor</th>
        <th>The diagnosis</th>
        <th>Medicine</th>
          <th>Date</th>
      </tr>
    </thead>
    <?php foreach ($rows as $row): ?>
      <?php
      $stmt=$db->prepare("SELECT name,specialization FROM doctor where id=:id");
      $stmt->execute(array(
        'id'=>$row['doctor_id'],
      ));

      $doctor=$stmt->fetch(PDO::FETCH_ASSOC);
      $stmt=$db->prepare("SELECT name FROM clinic where id=:id");
      $stmt->execute(array(
        'id'=>$doctor['specialization'],
      ));
      $clinic=$stmt->fetch(PDO::FETCH_ASSOC);
       ?>
    <tbody>
      <tr>
        <th><?php echo $clinic['name']; ?></th>
        <td><?php echo $doctor['name']; ?></td>
        <td><?php echo $row['diagnosis']; ?></td>
        <td><?php echo $row['medicine']; ?></td>
          <td><?php echo $row["date"]; ?></td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>
</div>
    <div class="container">
      <button class="open-button" onclick="openForm()">Pharmacy</button>
    <hr class="new">
     </div>

     <form action="patient_data.php" method="POST">
     <div class="container">
    <div class="patient-info">
  <div class="form-group">
      <label for="name">Diagnosis :</label> <textarea  class="form-control" rows="5" name="diagnosis"> </textarea>
     </div>
     <div class="form-group">
      <label for="name">Medicine :</label> <textarea  class="form-control" rows="3" name="medicine"> </textarea>
     </div>
        <div class="form-group">
       <label for="date"><b>Date :</b></label>
        <div class="form-group"><input type="date" name="date"></div> <br>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-success" type="submit" name="confirm" >Submit</button>
            <input type="hidden" name="patient" value="<?php echo $_GET['patient'];?>">
        </div>
         </div>
     </div>
    </form>



<!-------------------------POPUP FORM--------------------------------------->

<div class="form-popup" id="myForm">
  <form action="medicine.php" class="form-container" method="POST">
    <h3>Search for medicine </h3>
    <br>
    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
    <button type="submit" name="submit" class="btn">Search</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>


<!-----------------------JAVA SCRIPT--------------------------------------------------->
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
  <!-- footer -->


       <!-- SCRIPTS -->
       <script src="js/jquery.js"></script>
       <script src="js/bootstrap.min.js"></script>
       <script src="js/owl.carousel.min.js"></script>
       <script src="js/smoothscroll.js"></script>
       <script src="js/custom.js"></script>

  </body>
  </html>
