<?php
// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enseignant_id = $_POST['enseignant_id'];
    $classe_id = $_POST['classe_id'];

    // Code pour ajouter à la base de données
    $sql = "INSERT INTO enseignants_classes (enseignant_id, classe_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$enseignant_id, $classe_id]);
    echo "Relation enseignant-classe ajoutée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Enseignant-Classe</title>
</head>
<body>
    <h1>Ajouter Relation Enseignant-Classe</h1>
    <form method="POST">
        <label>ID Enseignant:</label><input type="text" name="enseignant_id" required><br>
        <label>ID Classe:</label><input type="text" name="classe_id" required><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
