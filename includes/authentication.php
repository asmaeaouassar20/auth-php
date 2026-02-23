<?php
session_start();
if(!isset($_SESSION['authenticated'])){
    $_SESSION['status']="Please log in to access to user dashboard";
    header('Location: ../auth-vues/login.php');
    exit(0);
}
?>