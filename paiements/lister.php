<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/paiements.php');

// Appeler la fonction pour lister les paiements
$paiements = lister_paiements(); // Assurez-vous que cette fonction est définie dans paiements.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Paiements</title>
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
    <h2>Liste des Paiements</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant ID</th>
                <th>Montant</th>
                <th>Date Paiement</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($paiements): // Vérifiez si $paiements n'est pas vide ?>
                <?php foreach ($paiements as $paiement): ?>
                <tr>
                    <td><?= htmlspecialchars($paiement['id']) ?></td>
                    <td><?= htmlspecialchars($paiement['etudiant_id']) ?></td>
                    <td><?= htmlspecialchars($paiement['montant']) ?></td>
                    <td><?= htmlspecialchars($paiement['date_paiement']) ?></td>
                    <td><?= htmlspecialchars($paiement['description']) ?></td>
                    <td><?= htmlspecialchars($paiement['statut']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= htmlspecialchars($paiement['id']) ?>">Modifier</a>
                        <a href="supprimer.php?id=<?= htmlspecialchars($paiement['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce paiement ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Aucun paiement trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
