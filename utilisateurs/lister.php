<?php
// lister.php
// Code pour récupérer et afficher la liste des utilisateurs
$sql = "SELECT id, nom, email, role FROM utilisateurs";
$stmt = $conn->query($sql);
$utilisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur): ?>
        <tr>
            <td><?= $utilisateur['id'] ?></td>
            <td><?= $utilisateur['nom'] ?></td>
            <td><?= $utilisateur['email'] ?></td>
            <td><?= $utilisateur['role'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
