<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php'); // Assurez-vous que ce fichier contient la fonction lister_evenements()

// supprimer.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Code pour supprimer l'événement de la base de données
    $sql = "DELETE FROM evenements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo "Événement supprimé avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Événement</title>
</head>
<body>
    <h1>Supprimer Événement</h1>
    <form method="POST">
        <label>ID de l'Événement à Supprimer:</label><input type="text" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
