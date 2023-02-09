<?php
	require_once 'db.php';

	
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM users WHERE email =:email AND password =:password";
	        $statement = $connect->prepare($sql);
	        $statement->execute(
		         array(
			          'username' => $_POST["username"],
			          'password' => $_POST["password"]
		         )
	        );
				$count = $statement->rowCount();  
                if($count > 0)  
                {
				$_SESSION['user'] = $fetch['id'];
				header("location: dashboard1.php");
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}

?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >

</head>
<body class="bg-dark">

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Login</h1>
			<form method="POST" action="">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
				<label for="email">Password:</label>
					<input type="password" name="password" placeholder="Enter Password" class="form-control">
				</div>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				
				<a href="register.php" class="btn btn-primary">Register</a>
			</form>
		</div>
	</div>
</div>
</body>
</html>
