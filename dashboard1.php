<?php 
    session_start();
  
    if(!$_SESSION){
        header('location:login.php');
    }

?>

<h1>Welcome <?php echo ucfirst($_SESSION['first_name']); ?></h1>
<p>This is your dashboard</p>
<a href="items.php?items=true">Items</a>
<a href="logout.php?logout=true">Logout</a>
