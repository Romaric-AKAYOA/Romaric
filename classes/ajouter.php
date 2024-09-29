<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $annee_scolaire = $_POST['annee_scolaire'];
    $description = $_POST['description'];
    
    ajouter_classe($nom, $annee_scolaire, $description);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Classe</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Ajouter une Classe</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required>
        <label for="annee_scolaire">Année Scolaire</label>
        <input type="text" name="annee_scolaire" required>
        <label for="description">Description</label>
        <textarea name="description"></textarea>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
