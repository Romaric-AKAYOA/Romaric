<?php
// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $enseignant_id = $_POST['enseignant_id'];
    $classe_id = $_POST['classe_id'];

    // Code pour mettre à jour la relation dans la base de données
    $sql = "UPDATE enseignants_classes SET enseignant_id = ?, classe_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$enseignant_id, $classe_id, $id]);
    echo "Relation enseignant-classe modifiée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Enseignant-Classe</title>
</head>
<body>
    <h1>Modifier Relation Enseignant-Classe</h1>
    <form method="POST">
        <label>ID Relation:</label><input type="text" name="id" required><br>
        <label>ID Enseignant:</label><input type="text" name="enseignant_id" required><br>
        <label>ID Classe:</label><input type="text" name="classe_id" required><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
