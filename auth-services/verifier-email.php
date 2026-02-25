<?php

session_start();
require '../config/dbcon.php';

if(isset($_GET['token'])){ 
    $token = $_GET['token'];

    $req='SELECT email,email_verifie, token, date_expiration_token  FROM users WHERE token="'.$token.'" LIMIT 1';
    $req = mysqli_query($dbconn,$req);
    if($res=mysqli_fetch_assoc($req)){
        if($res['email_verifie']=="0"){
            $date_expiration_token=$res['date_expiration_token'];
            if(new DateTime($date_expiration_token) < new DateTime()){ 
                $_SESSION['status']="Le lien est expiré";
                $_SESSION['alert']="danger";
                header("location: ../auth-vues/result-register.php");
                exit;
            }

            // supprimer le token
            $email = $res['email'];
                $req = 'UPDATE users SET token=NULL, email_verifie=1, date_expiration_token=NULL WHERE email="'.$email.'"';
                if(mysqli_query($dbconn, $req)){
                    $_SESSION['status']="Email vérifié avec succes";
                     $_SESSION['alert']="success";
                }else{
                    $_SESSION['status']="Erreur lors de la vérification de l'email";
                    $_SESSION['alert']="danger";
                }
        }else{
            $_SESSION['status']="email alrady verified. please login";
             $_SESSION['alert']="primary";
        }

    }else{
        $_SESSION['status']="Jeton pour vérifier votre email n'existe pas";
         $_SESSION['alert']="danger";
    }


        
}else{
    $_SESSION['status']="Non autorisé";
    $_SESSION['alert']="danger";
}
header('Location: ../auth-vues/result-register.php');

?>