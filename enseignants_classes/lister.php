<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants_classes.php');  // Mise à jour ici

// Appeler la fonction pour lister les relations enseignants-classes
$relations = lister_relations(); // Assurez-vous que cette fonction est définie dans enseignants_classes.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Relations Enseignants-Classes</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Relations Enseignants-Classes</h2>
    <table>
        <thead>
            <tr>
                <th>ID Relation</th>
                <th>Nom Enseignant</th>
                <th>Nom Classe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($relations): // Vérifiez si $relations n'est pas vide ?>
                <?php foreach ($relations as $relation): ?>
                <tr>
                    <td><?php echo htmlspecialchars($relation['id']); ?></td>
                    <td><?php echo htmlspecialchars($relation['enseignant_nom']); ?></td>
                    <td><?php echo htmlspecialchars($relation['classe_nom']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $relation['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $relation['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette relation ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucune relation trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
