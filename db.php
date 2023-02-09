<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=list_db', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>