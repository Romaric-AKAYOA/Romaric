<?php
include('../../src/db.php');
include('../../src/enseignants.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $specialite = $_POST['specialite'];
    
    ajouter_enseignant($nom, $prenom, $email, $specialite);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Enseignant</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Ajouter un Enseignant</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="specialite">Spécialité</label>
        <input type="text" name="specialite" required>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
