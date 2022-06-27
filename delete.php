<?php

include 'model.php';

$model = new Model();
$id = $_REQUEST['id'];
$delete = $model->delete($id);

if($delete){
    echo "<script>alert('User has been deleted')</script>";
    echo "<script>window.location.href = 'list.php'</script>";
   }else{
       echo "<script>alert('Sorry something is wrong, Please try again')</script>";
       echo "<script>window.location.href = 'list.php'</script>";
   }





?>