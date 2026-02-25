<?php

include('../config/dbcon.php');
require '../includes/mail.php';

if(isset($_POST['register-btn'])){
  if(empty($_POST['email']) || empty($_POST['password'])){
    $_SESSION['status'] = "Email et mot de passe sont obligatoires";
    $_SESSION['alert'] = "danger";
    header("Location: ../auth-vues/result-register.php");
    exit;
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $query_run = mysqli_query($dbconn, $query);

  if(mysqli_num_rows($query_run)>0){
    $_SESSION['status'] = "User with this email already exists";
    $_SESSION['alert']="danger";
  }else{
    $query = "INSERT INTO users(username,email,phone,password) VALUES('$name','$email','$phone','$password')";
    $query_run = mysqli_query($dbconn, $query);

    if($query_run){
        send_email_verify($name, $email);
    }else{
        $_SESSION['status']="Registration failed";;
        $_SESSION['alert']="danger";
    }
  }
  header("Location: ../auth-vues/result-register.php");
}

?>