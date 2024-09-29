<?php
// supprimer.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Code pour supprimer la relation de la base de données
    $sql = "DELETE FROM enseignants_classes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo "Relation enseignant-classe supprimée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Enseignant-Classe</title>
</head>
<body>
    <h1>Supprimer Relation Enseignant-Classe</h1>
    <form method="POST">
        <label>ID Relation à Supprimer:</label><input type="text" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
