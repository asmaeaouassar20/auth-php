<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../config/PHPMailer/src/Exception.php';
require '../config/PHPMailer/src/PHPMailer.php';
require '../config/PHPMailer/src/SMTP.php';


function send_email_verify($name, $email){
    require_once '../configs/config.php';
    require_once '../config/dbcon.php';

    global $dbconn;

    $mail = new PHPMailer(true);
    try {
    //Server settings                   //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $username;                     //SMTP username
    $mail->Password   = $password;                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('asmae@algostyle.com', 'Asmae Aouassar');
    $mail->addAddress($email, $name);     //Add a recipient

    $token = md5(rand());
    $date_expiration_token = time();
    $lien = "http://localhost/auth-php/auth-services/verifier-email.php?token=$token";

    $requete= 'UPDATE users SET token="'.$token.'", date_expiration_token="'.$date_expiration_token.'" WHERE email="'.$email.'"';
    if(!mysqli_query($dbconn,$requete)){
        $_SESSION['status']="Erreur lors l'envoi d'email";
        header("Location: ../auth-vues/result-register.php");
        exit;
    }
    mysqli_close($dbconn);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vérification de votre adresse email';
    $mail->Body    = "Bonjour, <b>$name</b><br>Cliquez sur le lien pour vérifier votre adresse email et activer votre compte<br><a href=$token>Click me</a>";
    $mail->AltBody = "Bonjour,$name\nCliquez sur le lien suivant pour vérifier votre adresse email et activer votre compte : $lien";

    $mail->send();
    $_SESSION['status']="Email envoyé avec succès vérifiez votre boite mail";
    $_SESSION['alert']="success";
} catch (Exception $e) {
    $_SESSION['status']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    $_SESSION['alert']="danger";
}
header('Location: ../auth-vues/result-register.php');
}

?>
