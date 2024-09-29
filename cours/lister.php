<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/cours.php');    

// Appeler la fonction pour lister les cours
$cours = lister_cours(); // Assurez-vous que cette fonction est définie dans cours.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Cours</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Cours</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Cours</th>
                <th>Enseignant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($cours): // Vérifiez si $cours n'est pas vide ?>
                <?php foreach ($cours as $cour): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cour['id']); ?></td>
                    <td><?php echo htmlspecialchars($cour['nom_cours']); ?></td>
                    <td><?php echo htmlspecialchars($cour['enseignant']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $cour['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $cour['id']; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucun cours trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
