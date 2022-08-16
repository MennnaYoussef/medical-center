<?php
session_start();

if($_SESSION['type']!='managerial'){
  header('location:index.php');
  return;
}
include "../includes/pdo.php";
 $stmt=$db->prepare("Select * from doctor order by specialization");
  $stmt->setFetchMode(PDO::FETCH_ASSOC); $stmt->execute();
   $doctors=$stmt->fetchAll();
    $stmt=$db->prepare("Select * from clinic");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $stmt->execute();
      $clinics=$stmt->fetchAll();
      ?>
<!DOCTYPE html>
<html>

<head>
	 <title>Admin page</title>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/doctor.css" />
</head>

<body>
	<div class="over">


		<nav class="navbar navbar-dark"> <a class="navbar-brand" href="#">
                Medical Center
            </a>
            <ul class="nav navbar-right">
            <li><a href="logout.php">Log out</a></li>
            </ul>
		</nav>


	</div>
	<div class="service">
		<div class="contanier-fluid">
			<div class="row">
				<div class="menu">
					<ul class="list-group">
						<a class="listcolor list-group-item list-group-item-dark" href="doctor.php"><i class="icon fas fa-user"></i>Doctor</a>
						<a class="listcolor list-group-item list-group-item-dark"  href="schedule.php" ><i class="icon fas fa-calendar-alt" href="schedule.php"></i>Schedule</a>
					</ul>

				</div>
				<div class="contentobjects">
					<div class="contentstudent">
						<div class="container addstudent">
							<button class="searchbtn addstudentbtn btn  my-2 my-sm-0" type="submit">Add Doctor</button>
						</div>
						<div class="sections">
							<div class="container">
								<div class="row">
									<div class="col-xl-9">
										<div class="servicetable">
											<table class="table table-dark">
												<thead>
													<tr>
														<th scope="col">Name</th>
														<th scope="col">Email</th>
														<th scope="col">Title</th>
														<th scope="col">Specialization</th>
														<!-- <th scope="col" colspan="2">Operation</th> -->
													</tr>
												</thead>
												<tbody>
													<?php foreach ($doctors as $doctor): ?>
													<?php $stmt=$db->prepare("Select name from clinic where id=:id"); $stmt->setFetchMode(PDO::FETCH_ASSOC); $stmt->execute(array('id'=>$doctor['specialization'])); $clinic=$stmt->fetch(); ?>
													<tr>
														<td>
															<?php echo $doctor[ 'name'] ;?>
														</td>
														<td>
															<?php echo $doctor[ 'email'] ;?>
														</td>
														<td>
															<?php echo $doctor[ 'title'] ;?>
														</td>
														<td>
															<?php echo $clinic[ 'name']; ?>
														</td>
														<!-- <td><i class='edit fas fa-edit' style='font-size:20px'> </i>  <i class="delete fas fa-trash" style='font-size:20px;margin-left:3px'></i>
														</td> -->
													</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Start OF STUDENT SHOWFORMS-->
				<div class="showform">
					<div class="section">
						<div class="container">
							<div class="row">
								<div class="col-xl-6">
									<div class="serviceform"> <i class="exitt fas fa-window-close"></i>
										<form action="doctor_process.php" method="post">
											<input type="text" placeholder="Name" class="form-control inputform" name="name" />
											<input type="text" placeholder="Email" class="form-control inputform" name="email" />
											<input type="text" placeholder="Title" class="form-control inputform" name="title" />
											<select class="custom-select inputform" name="specialization">
												<option selected>Specialization...</option>
												<?php foreach ($clinics as $clinic): ?>
												<option value="<?php echo $clinic['id']; ?>">
													<?php echo $clinic[ 'name']; ?>
												</option>
												<?php endforeach; ?>
											</select>
											<input type="submit" class="btn btn-secondary inputbtn" name="add" value="Submit" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--END OF STUDENT SHOWFORMS-->
				<!--START OF STUDENT EDITFORMS-->
				<div class="editform">
					<div class="section">
						<div class="container">
							<div class="row">
								<div class="col-xl-6">
									<div class="serviceform"> <i class="exit fas fa-window-close"></i>
										<form action="doctor_process.php" method="post">
											<input type="text" placeholder="Name" class="form-control inputform" name="name" />
											<input type="text" placeholder="Email" class="form-control inputform" name="email" />
											<input type="text" placeholder="Title" class="form-control inputform" name="title" />
											<select class="custom-select inputform" name="specialization">
												<option selected>Specialization...</option>
												<?php foreach ($clinics as $clinic): ?>
												<option value="<?php echo $clinic['id']; ?>">
													<?php echo $clinic[ 'name']; ?>
												</option>
												<?php endforeach; ?>
											</select>
											<input type="submit" class="btn btn-secondary inputbtn" name="edit" value="Submit" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/index.js"></script>
	<script src="js/doctor.js"></script>
	<script src="js/teacherassistant.js"></script>
	<script src="js/courses.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
