<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/inscriptions.php');

// Appel de la fonction pour lister les inscriptions
$inscriptions = lister_inscriptions(); // Vérifiez que cette fonction est définie dans inscriptions.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Inscriptions</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Inscriptions</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Étudiant</th>
                <th>Prénom Étudiant</th>
                <th>Nom Cours</th>
                <th>Date d'Inscription</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($inscriptions): // Vérifiez si $inscriptions n'est pas vide ?>
                <?php foreach ($inscriptions as $inscription): ?>
                <tr>
                    <td><?php echo htmlspecialchars($inscription['id']); ?></td>
                    <td><?php echo htmlspecialchars($inscription['etudiant_nom']); ?></td>
                    <td><?php echo htmlspecialchars($inscription['etudiant_prenom']); ?></td>
                    <td><?php echo htmlspecialchars($inscription['cours_nom']); ?></td>
                    <td><?php echo htmlspecialchars($inscription['date_inscription']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $inscription['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $inscription['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucune inscription trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
