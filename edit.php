<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: items.php');
    exit;
}

$success = false;

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

    $success = true;
}



$statement = $pdo->prepare('SELECT * FROM item_list WHERE id = :id AND user_id = :user_id');
$statement->bindValue(':id', $id);
$statement->bindValue(':user_id', $_SESSION['user_id']);
$statement->execute();
$item = $statement->fetch(PDO::FETCH_ASSOC);

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
    <link href="styles.css" rel="stylesheet">
    <title>Item List</title>

  
</head>

<body>
    <?php if ($success) : ?>
    <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    Item updated successfully.
    </div> 
    <?php endif; ?>

    <p>
        <a href="items.php" class="btn btn-info">Go back to items</a>
    </p>

<?php if (isset($item['id'])) : ?>    


<h1>Edit Item</h1>
 
<form action="" method="post">
    <div class="mb-3">
        <label>Item Name</label>
        <input type="text" name="name" value="<?php echo $item['name'] ?>" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Item Description</label>
        <textarea class="form-control" name="description"><?php echo $item['description'] ?></textarea>
    </div>
    <div class="mb-3">
        <label>Item Quantity</label>
        <input type="number" name="quantity" value="<?php echo $item['quantity'] ?>" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Item Price</label>
        <input type="number" name="price" value="<?php echo $item['price'] ?>" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
</form> 
<?php else: ?>
    Item not found
<?php endif; ?>    
  </body>
</html>