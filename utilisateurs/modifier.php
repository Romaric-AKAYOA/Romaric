<?php
// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Code pour mettre à jour l'utilisateur dans la base de données
    $sql = "UPDATE utilisateurs SET nom = ?, email = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $email, $role, $id]);
    echo "Utilisateur modifié avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <h1>Modifier Utilisateur</h1>
    <form method="POST">
        <label>ID Utilisateur:</label><input type="text" name="id" required><br>
        <label>Nom:</label><input type="text" name="nom" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Rôle:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="utilisateur">Utilisateur</option>
        </select><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
