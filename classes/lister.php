<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    

// Appel de la fonction pour lister les classes
$classes = lister_classes(); // Assurez-vous que cette fonction est bien définie
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Classes</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Année Scolaire</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($classes): // Vérifiez si $classes n'est pas vide ?>
                <?php foreach ($classes as $classe): ?>
                <tr>
                    <td><?php echo htmlspecialchars($classe['id']); ?></td>
                    <td><?php echo htmlspecialchars($classe['nom']); ?></td>
                    <td><?php echo htmlspecialchars($classe['annee_scolaire']); ?></td>
                    <td><?php echo htmlspecialchars($classe['description']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $classe['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $classe['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Aucune classe trouvée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
