<?php
$page_title="Regiter Form";
include('../includes/header.php');
include('../includes/navbar.php');
include('../includes/mail.php');
?>



<div class="py-5">
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
               <div class="card">
                    <h5 class="card-header">Registration form</h5>
                    <div class="card-body">
                        <form method="POST" action="../auth-services/register.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                             <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" id="telephone">
                            </div>
                             <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password">
                            </div>
                           
                            <button type="submit" name="register-btn" class="btn btn-primary">Register</button>
                      </form>
                <div class="form-text">already have an account <a href="login.php">Login</a> </div>
                        </div>
                        </div>

            </div>
        </div>
        <a class="mt-3 btn btn-outline-warning "  href="../index.php">Home</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>







<!--



//$mysqli = require __DIR__ . "/../config/dbcon2.php"; //récupération de la connexion MySQL (ou autre variable renvoyée par return)
                                                    // initialiser $mysqli à partir de dbcon2
                                                    // dbcon2.php doit renvoyer un objet $mysqli

/*

==> $sql = "INSERT INTO users(username, email, password) VALUES(?, ?, ?)"; 

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

//$stmt = $mysqli->prepare($sql); //  on utilise prepared statements pour la sécurité contre les injections SQL
// $stmt->bind_param('sss', $username, $email, $password_hash);




    /*
        - 1062 → code d’erreur MySQL spécifique
        - 1062 = Duplicate entry (entrée dupliquée)
        - Cela se produit quand on essaie d’insérer dans la base une valeur unique déjà existante.
    */

-->