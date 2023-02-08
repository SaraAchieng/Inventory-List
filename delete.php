<?php
require 'db.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: items.php');
    exit;
}
$statement = $pdo->prepare('DELETE FROM item_list WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header("Location: items.php");




?>