<?php
// supprimer.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Code pour supprimer l'utilisateur de la base de données
    $sql = "DELETE FROM utilisateurs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    echo "Utilisateur supprimé avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Utilisateur</title>
</head>
<body>
    <h1>Supprimer Utilisateur</h1>
    <form method="POST">
        <label>ID Utilisateur à Supprimer:</label><input type="text" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
