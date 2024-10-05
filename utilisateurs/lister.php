<?php
// Inclure le fichier de connexion à la base de données
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');

// Code pour récupérer et afficher la liste des utilisateurs
$sql = "SELECT id, nom, email, role FROM utilisateurs";
$stmt = $db->query($sql);
$utilisateurs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Utilisateurs</title>
    <!-- Intégration de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Liste des Utilisateurs</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th> <!-- Colonne pour les boutons d'action -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $utilisateur): ?>
                <tr>
                    <td><?= htmlspecialchars($utilisateur['id']) ?></td>
                    <td><?= htmlspecialchars($utilisateur['nom']) ?></td>
                    <td><?= htmlspecialchars($utilisateur['email']) ?></td>
                    <td><?= htmlspecialchars($utilisateur['role']) ?></td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="modifier.php?id=<?= $utilisateur['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        
                        <!-- Bouton Supprimer -->
                        <a href="supprimer.php?id=<?= $utilisateur['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Intégration du JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
