<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/notes.php');

// Appeler la fonction pour lister les notes
$notes = lister_notes(); // Vérifiez que cette fonction est bien définie dans notes.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Notes</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Liste des Notes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>Cours</th>
                <th>Note</th>
                <th>Date d'enregistrement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($notes)): // Vérifier si $notes n'est pas vide ?>
                <?php foreach ($notes as $note): ?>
                <tr>
                    <td><?= htmlspecialchars($note['id']); ?></td>
                    <td><?= htmlspecialchars($note['etudiant_nom'] . ' ' . htmlspecialchars($note['etudiant_prenom'])); ?></td>
                    <td><?= htmlspecialchars($note['cours_nom']); ?></td>
                    <td><?= htmlspecialchars($note['note']); ?></td>
                    <td><?= htmlspecialchars($note['date_enregistrement']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $note['id']; ?>">Modifier</a> |
                        <a href="supprimer.php?id=<?= $note['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucune note trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
