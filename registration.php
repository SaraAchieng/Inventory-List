<?php
	require_once 'db.php';
	if($_POST){
		if($_POST['first_name'] != "" || $_POST['last_name'] != "" || $_POST['user_name'] != "" || $_POST['email'] != "" || $_POST['password'] != ""){
			try{
				$firstname = $_POST['first_name'];
				$lastname = $_POST['last_name'];
				$username = $_POST['user_name'];
                $email = $_POST['email'];
				$password = $_POST['password'];
				$sql = "INSERT INTO users (first_name, last_name, user_name,  email, password) VALUES (:first_name, :last_name, :username, :email, :password)";
				$statement->bindValue(':first_name', $firstname);
				$statement->bindValue(':last_name', $lastname);
				$statement->bindValue(':user_name', $username);
				$statement->bindValue(':email', $email);
				$statement->bindValue(':password', $password);
			    $statement->execute();
			
			$_SESSION['msg'] = "Registration was successful";
			
			$pdo = null;
			header('location:index.php');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		}else{
			echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'registration.php'</script>
			";
		}
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
		<div class="col-md-5 mt-3 pt-2 pb-5 align-self-center border bg-light">
			<h1 class="mx-auto w-25" >Register</h1>
			<form method="POST" action="">
                <div class="form-group">
					<label for="email">First Name:</label>
					<input type="text" name="first_name" placeholder="Enter First Name" class="form-control" value="">
				</div>
                <div class="form-group">
					<label for="email">Last Name:</label>
					<input type="text" name="last_name" placeholder="Enter Last Name" class="form-control" value="">
				</div>
                <div class="form-group">
					<label for="email">User name:</label>
					<input type="text" name="user_name" placeholder="Enter User Name" class="form-control" value="">
				</div>
                <div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Enter Email" class="form-control" value="">
				</div>
				<div class="form-group">
				<label for="email">Password:</label>
					<input type="password" name="password" placeholder="Enter Password" class="form-control" value="">
				</div>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				<p class="pt-2"> Back to <a href="index.php">Login</a></p>
				
			</form>
		</div>
	</div>
</div>
</body>
</html>
