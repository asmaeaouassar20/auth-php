<?php 

$mysqli = require __DIR__ . "/../config/dbcon2.php"; //récupération de la connexion MySQL (ou autre variable renvoyée par return)
                                                    // initialiser $mysqli à partir de dbcon2
                                                    // dbcon2.php doit renvoyer un objet $mysqli

//include('../config/dbcon.php');

if(empty($_POST['username'])){
    die("username is required");
}
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("valid email is required");
}
if(strlen($_POST['password']) < 8){
    die("The number of characters must be greater than 8");
}
if(!preg_match("/[a-z]/i",$_POST["password"])){
   die("Password must contain at least one letter");
}
if(!preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}
if($_POST["password"]!==$_POST["confirm-password"]){
    die("confirm your password correctly");
}

$username=trim($_POST['username']);
$email=trim($_POST['email']);
$password_hash=password_hash($_POST['password'],PASSWORD_DEFAULT);



$sql = "INSERT INTO users(username, email, password) VALUES(?, ?, ?)"; 
/*
Les points d’interrogation ? dans cette requête SQL sont appelés des placeholders (ou paramètres).
Ils servent à remplacer les valeurs directement dans la requête pour plus de sécurité et de fiabilité.
1 - Sécurité
Sans ? : $sql = " INSERT INTO users(username) VALUES ('$username')";
- Un utilisateur malveillant pourrait entrer du code SQL dans un champ (ex: "admin' --")
- Ce qui peut modifier la requête,  accéder aux données, supprimer des tables
- Avec ?, la base de données comprend que ce sont des données, pas du code.
ex:
* Un utilisateur tape :  admin' --
* Le symbole -- signifie :"ignore tout ce qui vient après" Donc la partie password est ignorée.
* Le système peut croire que c’est l’admin.
* Sans ? : C’est comme si tu laissais un inconnu modifier ta question.

Avec ? : 
* La base de données comprend :"Ceci est juste du texte" PAS du code.
* Donc la requête reste normale et le système reste sécurisé
* On dit : "Donne-moi ton texte, mais tu ne touches pas à ma requête."

2 - Séparation entre requête et données
- La requête dit que : Je vais insérer 3 valeurs ici.  Puis tu envoies les vraies valeurs après.

3 - Performance
Si la même requête est exécutée plusieurs fois : la base la prépare une seule fois et ça va plus vite

*/


//$stmt = $mysqli->stmt_init(); // stmt_init() : initialise un objet statement vide, que tu pourras préparer avec une requête SQL.
                                // stmt : représente la requête préparée avant de lui donner un SQL concret.
                                // Tu n’as pas besoin de $stmt = $mysqli->stmt_init(); si tu utilises prepare() directement.


//$stmt = $dbconn->prepare($sql); //prépare une requête SQL sans l’exécuter tout de suite
                                // Protège contre les injections SQL. On exécute après avec les valeurs réelles (execute() ou bind_param())
                                // 

$stmt = $mysqli->prepare($sql); // on utilise prepared statements pour la sécurité contre les injections SQL
$stmt->bind_param('sss', $username, $email, $password_hash);


try{
    $stmt->execute();
    header("Location: ../auth-vues/login.html");
    exit;
}catch(mysqli_sql_exception $e){
    if($mysqli->errno===1062){
        echo "email or username already exist";
    }else{
        die("error while signing up");
    }
    

    /*
        - 1062 → code d’erreur MySQL spécifique
        - 1062 = Duplicate entry (entrée dupliquée)
        - Cela se produit quand on essaie d’insérer dans la base une valeur unique déjà existante.
    */
}


?>