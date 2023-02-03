<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=list_db', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM item_list WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$item = $statement->fetch(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    

    $statement = $pdo->prepare("UPDATE item_list SET name = :name, description = :description, quantity = :quantity, price = :price WHERE id = :id");
            
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    $statement->execute(); 
}
    

?>                        



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="list.css" rel="stylesheet">
    <title>Item List</title>
</head>
<body>
    <p>
        <a href="index.php" class="btn btn-info">Go back to items</a>
    </p>


<h1>Edit Item</h1>
<form action="" method="post">
    <div class="mb-3">
        <label>Item Name</label>
        <input type="text" name="name" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Item Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <div class="mb-3">
        <label>Item Quantity</label>
        <input type="number" name="quantity" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Item Price</label>
        <input type="number" name="price" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


    
  </body>
</html>