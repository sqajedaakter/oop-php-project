
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User registration update</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">
        <header>User Registration update</header>
        <?php
        
        include 'model.php';

        $model = new Model();
        $id = $_REQUEST['id'];
        $editData = $model->edit($id);



        if(isset($_POST['submit'])){
            if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['email'])){
                if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone']) && !empty($_POST['email'])){

                    $data['id'] = $id;
                    $data['first_name'] = $_POST['first_name'];
                    $data['last_name'] = $_POST['last_name'];
                    $data['phone'] = $_POST['phone'];
                    $data['email'] = $_POST['email'];
    
    
                    //SQL Qurery//
                    $update = $model->update($data);
                    if($update){
                     echo "<script>alert('User has been updated')</script>";
                     echo "<script>window.location.href = 'list.php'</script>";
                    }else{
                        echo "<script>alert('Sorry something is wrong, Please try again')</script>";
                        echo "<script>window.location.href = 'edit.php'</script>";
                    }
                }else{
                    echo "<script>alert('Empty value')</script>";
                  
                }
            }
        }

        
        
        
        ?>
        <form method="POST">
            <fieldset>
                <input type="text" name="first_name" value="<?php echo $editData['first_name']?>" class="username" placeholder="First name"/><br/><br/>
                <input type="text" name="last_name"value="<?php echo $editData['last_name']?>"  class="username" placeholder="Last name"/><br/><br/>
                <input type="tel" name="phone"value="<?php echo $editData['phone']?>"  class="username" placeholder="phone number..."/><br/><br/>
                <input type="email" name="email"value="<?php echo $editData['email']?>" class="username" placeholder="email..."/><br/><br/>
                <input type="submit" name="submit" id="submit" value="Update"/><br/><br/>
                <a href="list.php" type="submit" name="login" id="login">User List</a>
            </fieldset>
        </form>
    </div>
</body>
</html>
