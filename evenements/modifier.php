<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php'); // Assurez-vous que ce fichier contient la fonction lister_evenements()

// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_evenement = $_POST['date_evenement'];
    $lieu = $_POST['lieu'];

    // Code pour mettre à jour l'événement dans la base de données
    $sql = "UPDATE evenements SET titre = ?, description = ?, date_evenement = ?, lieu = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $description, $date_evenement, $lieu, $id]);
    echo "Événement modifié avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Événement</title>
</head>
<body>
    <h1>Modifier Événement</h1>
    <form method="POST">
        <label>ID de l'Événement:</label><input type="text" name="id" required><br>
        <label>Titre:</label><input type="text" name="titre" required><br>
        <label>Description:</label><textarea name="description"></textarea><br>
        <label>Date de l'Événement:</label><input type="date" name="date_evenement" required><br>
        <label>Lieu:</label><input type="text" name="lieu"><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
