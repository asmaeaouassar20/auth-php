<?php

session_start(); // déarre la session

$_SESSION = [];  // Vider les variables de session

session_destroy();  // détruire la session

header("Location: ../auth-vues/login.php"); // rediriger vers la page de login

exit();

?>