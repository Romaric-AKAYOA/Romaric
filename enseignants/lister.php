<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants.php');    

// Appeler la fonction pour lister les enseignants
$enseignants = lister_enseignants(); // Assurez-vous que cette fonction est définie dans enseignants.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Enseignants</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Enseignants</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($enseignants): // Vérifiez si $enseignants n'est pas vide ?>
                <?php foreach ($enseignants as $enseignant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($enseignant['id']); ?></td>
                    <td><?php echo htmlspecialchars($enseignant['nom']); ?></td>
                    <td><?php echo htmlspecialchars($enseignant['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($enseignant['email']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $enseignant['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $enseignant['id']; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Aucun enseignant trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
