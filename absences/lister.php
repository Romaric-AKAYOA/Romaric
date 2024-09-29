<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// Appeler la fonction pour lister les absences
$absences = lister_absences(); // Assurez-vous que cette fonction est définie dans absences.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Absences</title>
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
    <h2>Liste des Absences</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant ID</th>
                <th>Cours ID</th>
                <th>Date d'Absence</th>
                <th>Justification</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($absences): // Vérifier si $absences contient des données ?>
                <?php foreach ($absences as $absence): ?>
                <tr>
                    <td><?= htmlspecialchars($absence['id']) ?></td>
                    <td><?= htmlspecialchars($absence['etudiant_id']) ?></td>
                    <td><?= htmlspecialchars($absence['cours_id']) ?></td>
                    <td><?= htmlspecialchars($absence['date_absence']) ?></td>
                    <td><?= htmlspecialchars($absence['justification']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= htmlspecialchars($absence['id']) ?>">Modifier</a>
                        <a href="supprimer.php?id=<?= htmlspecialchars($absence['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette absence ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucune absence trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
