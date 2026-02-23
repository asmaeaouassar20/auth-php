<?php

require '../config/dbcon.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $req='SELECT email_verifie, token, date_expiration_token  FROM users WHERE token="'.$token.'" LIMIT 1';
    $req = mysqli_query($dbconn,$req);
    if($res=mysqli_fetch_assoc($req)){
        if($res['email_verifie']=="0"){
            $token_db = $res['token'];
            if($token!==$token_db){
                $_SESSION['status']="Lien de vérification invalid";
                header("Location: ../auth-vues/result-register.php");
                exit;
            }
            
            $date_expiration_token=$res['date_expiration_token'];
            if($date_expiration_token > now()){
                $_SESSION['status']="Le lien est expiré";
                header("location: ../auth-vues/result-register.php");
                exit;
            }

            // supprimer le token
                $req = 'UPDATE users SET token=NULL, email_verifie="1", date_expiration_token="NULL" WHERE email="'.$email.'"';
                if(mysqli_query($dbconn, $req)){
                    $_SESSION['status']="Email vérifié avec succes";
                }else{
                    $_SESSION['status']="Erreur lors de la vérification de l'email";
                }
        }else{
            $_SESSION['status']="email alrady verified. please login";
        }

    }else{
        $_SESSION['status']="Jeton pour vérifier votreemail n'existe pas";
    }


        
}else{
    $_SESSION['status']="Non autorisé";
}
header('Location: ../auth-vues/result-register.php');

?>