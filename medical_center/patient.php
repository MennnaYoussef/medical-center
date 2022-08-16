<?php
include 'includes/patient_header.php';
session_start();
if(!$_SESSION['type']=="doctor"){
  header('location:login_form.php');
  session_destroy();
}
if(isset($_SESSION['success'])){
if($_SESSION['success']=='1'){
  echo '<script>alert("Medicine is found")</script>';
  }
  else{
    echo '<script>alert("Medicine Not found")</script>';
  }
    unset($_SESSION['success']);
}
 ?>
<?php
$stmt=$db->prepare("SELECT *  FROM doctor_patient where patient_id=:id");
$stmt->execute(array(
  'id'=>$_SESSION['id'],
));
$rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- body -->
     <div class="container">
  <h2>History</h2>
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

     </div>


<!-------------------------POPUP FORM--------------------------------------->

<div class="form-popup" id="myForm">
  <form action="medicine.php" class="form-container" method="POST">
    <h3>Search for medicine </h3>
    <br>
    <label for="email"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>
    <button type="submit" name="submit" class="btn">Search</button>
    <input type="hidden" name="patient" value="1">
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
