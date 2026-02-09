<?php

include('../config/dbcon.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' ";
$result = $dbconn->query($sql);

if($result->num_rows > 0){
    $user = $result->fetch_assoc();
    $hashed_password=$user['password']; // récupérer le hash depuis la BD
    if(password_verify($password, $hashed_password)){
        echo "
        <script>
        window.alert('Logged successfully');
        window.location.href='../auth-vues/dashboard.html';
        </script>
        ";
    }else{
        echo "
        <script>
        window.alert('mot de passe erroné');
        window.location.href='../auth-vues/login.html';
        </script>
        ";
    }
}else{
    echo "
    <script>
    window.alert('user not found');
    window.location.href='../auth-vues/login.html';
    </script>
    ";
}


?>