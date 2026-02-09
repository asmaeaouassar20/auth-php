<?php

session_start();

if(isset($_SESSION["user_id"])){

$mysqli = require __DIR__ . "/config/dbcon2.php";
$sql = "SELECT * FROM user WHERE id={$_SESSION["user_id"]}";
$result = $mysqli->query($sql);
$user=$result->fetch_assoc();
}

?>

<html>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Home</h1>
    <?php if(isset($user)): ?>
        <p>You're logged in</p>
        <p>hey, <?= htmlspecialchars($user["name"]) ?></p>
        <a>Logout</a>
    <?php else : ?>
        <p><a href="/auth-php/auth-vues/login.html">Log In</a> or <a href="/auth-php/auth-vues/register.html">Sign up</a></p>
    <?php endif; ?>
</body>

</html>