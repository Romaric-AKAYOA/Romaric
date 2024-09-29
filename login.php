<?php
// login.php

session_start();

// Inclusion des fichiers de configuration et de fonctions
require_once 'src/db.php';
require_once 'src/utilisateurs.php';

// Initialisation des variables
$error = '';

// Traitement du formulaire de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Appel de la fonction de connexion
    if (login($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion Scolaire</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <?php if ($error) { echo "<p style='color: red;'>$error</p>"; } ?>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
