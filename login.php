<?php
	require_once 'db.php';

	
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM users WHERE email =:email AND password =:password";
	        $statement = $pdo->prepare($sql);
	        $statement->bindValue(":email", $email);
	        $statement->bindValue(":password", $password);
	        $statement->execute();
	    	$count = $statement->rowCount();
	        $user = $statement->fetch(PDO::FETCH_ASSOC);

                if($count > 0)  
                {
			$_SESSION['user_id'] = $user['id'];
	        $_SESSION['user_fname'] = $user['first_name'];
				header("location: dashboard.php");
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