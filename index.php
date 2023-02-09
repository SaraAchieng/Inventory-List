<?php 
session_start();
	if(isset($_SESSION['user_id']))
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	</head>
<body>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Login</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form action="login.php" method="POST">	
				<h4 class="text-success">Login here...</h4>
				<hr style="border-top:1px groovy #000;">
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control" name="login">Login</button>
				</div>
				<a href="registration.php">Registration</a>
			</form>
		</div>
	</div>
</body>
</html>