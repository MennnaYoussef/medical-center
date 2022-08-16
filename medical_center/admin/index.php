<?php
  session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div class="container">
  	<div class="login-box">
			<div class="row">
				<div class="col-md-8 login-left">
					<h1>Admin Login</h1>
						<form action="login.php"  method="post">
							<div class="form-group">
                <?php
                //FLASH MESSAGE
                 if (isset($_SESSION['error'])) {
                     echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
                     unset($_SESSION['error']);
                 }
                  ?>
					<label for="email"><b>Email</b></label>
					<input class="form-control" id="email"  type="text" name="email"  >
				</div>
				<div class="form-group">
					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password">
				</div>
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign In">
		    </form>

				</div>

		</div>
		</div>
</body>
</html>
