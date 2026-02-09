<?php

$db_host='localhost';
$db_user='root';
$db_password='';
$db_name='db_auth';

$dbconn = new mysqli($db_host, $db_user, $db_password, $db_name);  // la variable $dbconn est disponible dans le fichier courant ou via include
/*
 - ici on a utilisé des arguments positionnel
 - ça fonctionne sur toutes les versions PHP (5,7,8)
 - C'est moins visible, car il faut connaître l'ordre
*/

/*

>> id
- type:  INT -> suffisant pour un grand nombre d'utilisateurs
- taille/valeurs : 11  -> convention mysql
<
 - le 11 ne définit PAS la taille maximale du nombre.
 - ❌ : INT(11) = nombre max à 11 chiffres
 - ✅ : * Un INT a TOUJOURS la même taille
         * INT = 4 octets
         * valeurs possibles:   signé:−2 147 483 648 à 2 147 483 647 /  UNSIGNED : 0 à 4 294 967 295
         * Peu importe que tu écrives INT(1), INT(11) ou INT(50) : Le nombre stocké est le même.
         * Historiquement, INT(11) servait : uniquement à l’affichage avec l’option ZEROFILL (ex : 00000001234)
  - Pourquoi on voit encore INT(11) partout ? 
            * c’était la valeur par défaut de MySQL
            * des millions de tutos, cours et outils (phpMyAdmin) l’utilisent
            * c’est devenu une convention visuelle
>
- valeur par défaut : aucune  ->  généré automatiquement
- attributs : unsigned -> pas de valeurs négatives
- null: false  ->  une clé primaire ne peut pas être nulle
- index: PRIMARY ->  identifie chaque ligne de façon unique
- A_I: true  -> Incrémentation automatique
- commentaire : identifiant unique


>> username
- type: VARCHAR -> Texte de longueur variable
- Taille/valeurs : 50  -> suffisant pour un pseudo (Le username peut contenir au maximum 50 caractères.)
- Valeur par défaut: aucune -> doit être fourni ( Si tu n’indiques pas de username lors de l’INSERT, MySQL refusera la ligne - il est non null/donc obligatoire, et il n'a pas de valeur par défaut (aucune) étant une mauvaise idée car on aura plein d’utilisateurs appelés "dafault_v", ça casserait l’unicité et il n'a aucun sens fonctionnel)   ) 
- Interclassement : utf8mb4_general_ci -> Support des accents et emojis
- Attributs : aucun -> Pas nécessaire  (Les attributs sont pensés pour les nombres : UNSIGNED, ZEROFILL)
- Null: false  -> Un utilisateur doit avoir un pseudo
- Index : UNQIUE  -> Pas deux utilisateurs avec le même pseudo
- Commentaire : Nom d’utilisateur


>> email
- Type: VARCHAR  -> Texte
- Taille/Valeurs : 100  -> Suffisant pour toutes les adresses email
- Valeur par défaut : aucune  -> obligatoire
- Interclassement: utf8mb4_general_ci  -> Gestion correcte des caractères
- Null : FALSE -> Email obligatoire 
- Index : UNIQUE -> Une adresse = un compte
- commentaire : Adresse email utilisateur


>> password
- type: VARCHAR  -> Stockage de hash
- taille/valeur: 255  -> Nécessaire pour bcrypt / argon2
- Valeur par défaut : aucune  -> doit être fourni
- Interclassement : utf8mb4_general_ci  -> Compatible avec tous les hash
- Null : FALSE  -> Mot de passe obligatoire
- Commentaire : Mot de passe hashé



*/

?>