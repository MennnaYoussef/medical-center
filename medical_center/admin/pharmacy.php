<?php
session_start();
if($_SESSION['type']!='pharmacy'){
  header('location:index.php');
  return;
}
include "../includes/pdo.php";
 $stmt=$db->prepare("Select * from pharmacy order by name");
  $stmt->setFetchMode(PDO::FETCH_ASSOC); $stmt->execute();
   $medicines=$stmt->fetchAll();
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
						<a class="listcolor list-group-item list-group-item-dark" href="pharmacy.php"><i class="icon fas fa-user"></i>Pharmacy</a>
					</ul>

				</div>
				<div class="contentobjects">
					<div class="contentstudent">
						<div class="container addstudent">
							<button class="searchbtn addstudentbtn btn  my-2 my-sm-0" type="submit">Add medicine</button>
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
                            <th scope="col">Found state</th>
                            <th scope="col">Remove from system</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($medicines as $medicine): ?>
													<tr>
														<td>
															<?php echo $medicine[ 'name'] ;?>
														</td>

                            <td>
                              <?php if($medicine['found']): ?>
                          <form action="pharmacy_process.php" method="post">
                              <button type="submit" class="btn btn-danger" name="delete">No</button>
                              <input type="hidden" name="id" value="<?php echo $medicine['id'];?>">
                            </form>
                            <?php else: ?>
                              <form action="pharmacy_process.php" method="post">
                                  <button type="submit" class="btn btn-success" name="add">Yes</button>
                                  <input type="hidden" name="id" value="<?php echo $medicine['id'];?>">
                                </form>
                              <?php endif; ?>
                            </td>
                            <td>
                              <form action="pharmacy_process.php" method="post">
                              <button type="submit" class="btn btn-danger" name="remove">Delete</button>
                              <input type="hidden" name="id" value="<?php echo $medicine['id'];?>">
                             </form>

                            </td>

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
										<form action="pharmacy_process.php" method="post">
											<input type="text" placeholder="Name" class="form-control inputform" name="name" />
											<input type="submit" class="btn btn-secondary inputbtn" name="submit" value="Submit" />
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
