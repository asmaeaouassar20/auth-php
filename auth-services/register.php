<?php

include('../config/dbcon.php');

if(isset($_POST['register-btn'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $query_run = mysqli_query($dbconn, $query);

  if(mysqli_num_rows($query_run)>0){
    $_SESSION['status'] = "User with this email already exists";
    header("Location: ../auth-vues/register.php");
  }else{
    $query = "INSERT INTO users(username,email,phone,password) VALUES('$name','$email','$phone','$password')";
    $query_run = mysqli_query($dbconn, $query);

    if($query_run){
        $_SESSION['status']="Restration successfully";
        header('Location: ../auth-vues/login.php');
    }else{
        $_SESSION['status']="Registration failed";;
        header('Location: ../auth-vues/register.php');
    }
  }
}

?>