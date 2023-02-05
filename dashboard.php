<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Connect to database
$dsn = "mysql:host=localhost;dbname=database_name";
$username = "db_username";
$password = "";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $username, $password, $options);

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

?>

<h1>Welcome, <?= $user['username'] ?></h1>
<p>This is your dashboard</p>
<a href="logout.php">Logout</a>

