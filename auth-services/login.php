<?php
session_start();
include('../config/dbcon.php');


if(isset($_POST['login-btn'])){
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
        $email = mysqli_real_escape_string($dbconn, $_POST['email']);

        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $query_run = mysqli_query($dbconn, $query);
        if(mysqli_num_rows($query_run) <= 0){
           $_SESSION['status'] = "Email Not found";
           header("Location: ../auth-vues/login.php");
        }else{
            $row = mysqli_fetch_array($query_run);
            $password_entred=mysqli_real_escape_string($dbconn, $_POST['password']);
            $password_db=$row['password'];
            if($password_db!==$password_entred){
                $_SESSION['status']="Incorrect Password";
                header('Location: ../auth-vues/login.php');
            }else{
                $_SESSION['authenticated']=TRUE;
                $_SESSION['status']="You are logged in successfully";
                $_SESSION['auth_user']= [
                    'username' => $row['username'],
                    'phone' => $row['phone'],
                    'email' => $row['email']
                ];
                header('Location: ../user/dashboard.php');
            }
        }
    }else {
            $_SESSION['status'] = "Email and password are necessary";
            header('Location: ../auth-vues/login.php');
       
    }
}

?>