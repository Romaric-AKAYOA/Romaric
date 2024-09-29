<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php'); // Assurez-vous que ce fichier contient la fonction lister_evenements()

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_evenement = $_POST['date_evenement'];
    $lieu = $_POST['lieu'];

    // Code pour ajouter à la base de données
    $sql = "INSERT INTO evenements (titre, description, date_evenement, lieu) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $description, $date_evenement, $lieu]);
    echo "Événement ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Événement</title>
</head>
<body>
    <h1>Ajouter Événement</h1>
    <form method="POST">
        <label>Titre:</label><input type="text" name="titre" required><br>
        <label>Description:</label><textarea name="description"></textarea><br>
        <label>Date de l'Événement:</label><input type="date" name="date_evenement" required><br>
        <label>Lieu:</label><input type="text" name="lieu"><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
