<?php

Class Model{


private $server = 'localhost';
private $username = 'root';
private $password;
private $db = 'batch_two';
private $connect;


//Check DB connection//

public function __construct()
{
    try{
     $this->connect = new mysqli($this->server, $this->username, $this->password, $this->db);
    }catch(Exception $exception){
    echo "Connection failed" . $exception->getMessage();
    }
}

//User insert quesry//

public function insert(){
    if(isset($_POST['submit'])){
        if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])){
            if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['password'])){
                $firstName = $_POST['first_name'];
                $lastName = $_POST['last_name'];
                $phone    = $_POST['phone'];
                $email    = $_POST['email'];
                $password = md5($_POST['password']);


                //SQL Qurery//
                $query = "INSERT INTO users(first_name, last_name, phone, email, password) VALUES ('$firstName', '$lastName', '$phone', '$email', '$password')";
                if($sql = $this->connect->query($query)){
                 echo "<script>alert('User has been created')</script>";
                 echo "<script>window.location.href = 'list.php'</script>";
                }else{
                    echo "<script>alert('Sorry something is wrong, Please try again')</script>";
                    echo "<script>window.location.href = 'index.php'</script>";
                }
            }else{
                echo "<script>alert('Empty value')</script>";
              
            }
        }
    }
}

//Get all users//

public function getUsers()
{
    $data = null;
    $query = "SELECT * FROM users";

    if($sql = $this->connect->query($query)){
     while ($row = mysqli_fetch_assoc($sql)){
     $data[] = $row;
     }
    }
    return $data;
}


public function edit($id)
{
    $data = null;
   $query = "SELECT * FROM users WHERE id = '$id'";

   if($sql = $this->connect->query($query)){
    while ($row = mysqli_fetch_assoc($sql)){
        $data = $row;
    }
   }

   return $data;
}

public function update($data)
{
   
    $update = "UPDATE users SET first_name = '$data[first_name]', last_name = '$data[last_name]', phone = '$data[phone]', email = '$data[email]' WHERE id = '$data[id]'";
 
    if($sql = $this->connect->query($update)){
        return true;
    }else{
        return false;
    }
}


public function delete($id)
{
    $query = "DELETE FROM users WHERE id = '$id'";
    if($sql = $this->connect->query($query)){
        return true;
    }else{
        return false;
    }

}







}






?>