<?php
$pdo = new PDO('mysql:host=localhost;dbname=list_db', 'root', '');
if (!$pdo) {
	die("Fatal Error: Connection Failed!");
}