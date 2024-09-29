<?php
// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    // Code pour ajouter l'utilisateur à la base de données
    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $email, $mot_de_passe, $role]);
    echo "Utilisateur ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Utilisateur</title>
</head>
<body>
    <h1>Ajouter Utilisateur</h1>
    <form method="POST">
        <label>Nom:</label><input type="text" name="nom" required><br>
        <label>Email:</label><input type="email" name="email" required><br>
        <label>Mot de passe:</label><input type="password" name="mot_de_passe" required><br>
        <label>Rôle:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="utilisateur">Utilisateur</option>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
