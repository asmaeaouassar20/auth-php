<?php

include('../config/dbcon.php');
require '../includes/mail.php';

if(isset($_POST['register-btn'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $query_run = mysqli_query($dbconn, $query);

  if(mysqli_num_rows($query_run)>0){
    $_SESSION['status'] = "User with this email already exists";
    $_SESSION['alert']="danger";
    header("Location: ../auth-vues/result-register.php");
  }else{
    $query = "INSERT INTO users(username,email,phone,password) VALUES('$name','$email','$phone','$password')";
    $query_run = mysqli_query($dbconn, $query);

    if($query_run){
        send_email_verify($name, $email);
    }else{
        $_SESSION['status']="Registration failed";;
        header('Location: ../auth-vues/register.php');
    }
  }
}

?>