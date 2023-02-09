<?php
require 'db.php';

$statement = $pdo->prepare("SELECT * FROM item_list WHERE user_id = :user_id");
$statement->bindValue(':user_id', $_SESSION['user_id']);
$statement->execute();
$items = $statement->fetchAll(PDO::FETCH_ASSOC);
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
<h1>Item List</h1>

<p>
  <a href="create.php" class="btn btn-success">Create Item</a>
  <a href="dashboard.php" class="btn btn-secondary">Home</a>
 
</p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Date Added</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($items as $i=> $item) :?>
    <tr>
      <th scope="row"><?php echo $i + 1?></th>
      <td><?php echo $item['name']?></td>
      <td><?php echo $item['description']?></td>
      <td><?php echo $item['quantity']?></td>
      <td><?php echo $item['price']?></td>
      <td><?php echo $item['date_added']?></td>
      <td>
          <a href="edit.php?id=<?php echo $item['id']?>" class="btn btn-primary">Edit</a>
          <form style="display: inline-block" method="post" action="" id="form-one">
               <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
               <button  type="submit" class="btn btn-danger">Delete</button>
          </form>
      </td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script>
    const formOne = document.getElementById('form-one');
    formOne.addEventListener('submit', (event) => {
        event.preventDefault()

        let confirmation = confirm('Are you sure?')

        if (confirmation) { 
        formOne.action = 'delete.php'    
        formOne.submit();
        }
    })

</script>



    
  </body>
</html>