<?
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// supprimer.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Code pour supprimer de la base de données
    $sql = "DELETE FROM absences WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo "Absence supprimée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Absence</title>
</head>
<body>
    <h1>Supprimer Absence</h1>
    <form method="POST">
        <label>ID à Supprimer:</label><input type="text" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
