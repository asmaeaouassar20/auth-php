<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name='db_auth';



$mysqli = new mysqli(
    hostname:$host,
    username:$username,
    password:$password,
    database:$db_name
);
/*
 - ici on a utilisé des arguments nommés
 - cela fonctionne uniquement à partir de PHP 8
 - C'est plus lisible
 - ne marche pas sur un serveur avec PHP 7 ou moins
*/


// Gestion des erreurs de connexion
// Si on ne gère pas la connexion, le script continue et peut planter plus loin
if($mysqli->connect_error){ // Vérifie si la connexion échoue
    die("connection error ".$mysqli->connect_error); // afficher un msg d'erreur clair et stopper le script
}


return $mysqli; // pour être inclu das un autre fichier
                // on peut faire : $mysqli = require 'dbcon2.php'

?>