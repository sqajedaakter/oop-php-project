<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container mt-5">
  <a href="index.php" class="btn btn-sm btn-success float-end">Add user</a>
  <table class="table table-primary mt-3">
  <thead>
  <tr>
      <th scope="col">id</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
        
        include 'model.php';

        $model = new Model();

        $rows = $model->getUsers();


        $i = 1;

        if(!empty($rows)){
          foreach($rows as $row){

        ?>

   <tr>
       <td><?php echo $i++ ;?></td>
       <td><?php echo $row['first_name']; ?></td>
       <td><?php echo $row['last_name']; ?></td>
       <td><?php echo $row['phone']; ?></td>
       <td><?php echo $row['email']; ?></td>
       <td>
        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-success btn-sm">Edit</a>
        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete  this  info ')">Delete</a>
       </td>
   </tr>
   <?php

        }
      }

   ?>
</tbody>
</table>
</div>
</body>
</html>