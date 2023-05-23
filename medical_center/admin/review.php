<?php
session_start();

if($_SESSION['type']!='review'){
  header('location:index.php');
  return;
}
include "../includes/pdo.php";
 $stmt=$db->prepare("Select * from reviews order by selected desc");
  $stmt->setFetchMode(PDO::FETCH_ASSOC); $stmt->execute();
   $reviews=$stmt->fetchAll();

   $stmt=$db->prepare("Select * from reviews where selected=:selected");
    $stmt->setFetchMode(PDO::FETCH_ASSOC); $stmt->execute(array('selected'=>'1'));
     $bests=$stmt->fetchAll();
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
						<a class="listcolor list-group-item list-group-item-dark" href="review.php"><i class="icon fas fa-user"></i>Reviews</a>
					</ul>

				</div>
				<div class="contentobjects">
					<div class="contentstudent">
						<div class="sections">
							<div class="container">
								<div class="row">
									<div class="col-xl-9">
										<div class="servicetable">
											<table class="table table-dark">
												<thead>
													<tr>
														<th scope="col">Name</th>
														<th scope="col">Title</th>
														<th scope="col">Message</th>
														<th scope="col">Rate</th>
                            <th scope="col">Selected</th>
														<th scope="col">Opertaion</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($reviews as $review): ?>
													<tr>
														<td>
															<?php echo $review[ 'name'] ;?>
														</td>
														<td>
															<?php echo $review[ 'title'] ;?>
														</td>
														<td>
															<?php echo $review[ 'message'] ;?>
														</td>
														<td>
															<?php echo $review[ 'rate']; ?>
														</td>
                            <td>
                              <?php echo $review[ 'selected']; ?>
                            </td>
                            <td>
                              <?php if($review['selected']): ?>
                          <form action="review_process.php" method="post">
                              <button type="submit" class="btn btn-block btn-danger" name="delete">Delete</button>
                              <input type="hidden" name="id" value="<?php echo $review['id'];?>">
                            </form>
                            <?php else: ?>
                              <form action="review_process.php" method="post">
                                  <button type="submit" class="btn btn-block btn-success" name="add">Add</button>
                                  <input type="hidden" name="id" value="<?php echo $review['id'];?>">
                                </form>
                              <?php endif; ?>
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
