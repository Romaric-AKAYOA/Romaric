<?php
include('../../src/db.php');
include('../../src/etudiants.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];

    ajouter_etudiant($nom, $prenom, $date_naissance, $email);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Étudiant</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <form action="ajouter.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required>
        <label for="date_naissance">Date de Naissance</label>
        <input type="date" name="date_naissance" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
