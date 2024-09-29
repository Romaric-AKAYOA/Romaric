<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php'); // Assurez-vous que ce fichier contient la fonction lister_evenements()

// Appeler la fonction pour lister les événements
$evenements = lister_evenements(); // Assurez-vous que cette fonction est définie dans evenements.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
    <h2>Liste des Événements</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Date</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($evenements): // Vérifiez si $evenements n'est pas vide ?>
                <?php foreach ($evenements as $evenement): ?>
                <tr>
                    <td><?= htmlspecialchars($evenement['id']) ?></td>
                    <td><?= htmlspecialchars($evenement['titre']) ?></td>
                    <td><?= htmlspecialchars($evenement['description']) ?></td>
                    <td><?= htmlspecialchars($evenement['date_evenement']) ?></td>
                    <td><?= htmlspecialchars($evenement['lieu']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= htmlspecialchars($evenement['id']) ?>">Modifier</a>
                        <a href="supprimer.php?id=<?= htmlspecialchars($evenement['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun événement trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
