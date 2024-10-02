<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    

// Récupérer la liste des classes
$classes = lister_classes();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Classes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Liste des Classes</h2>
        
        <?php if (empty($classes)): ?>
            <div class="alert alert-warning" role="alert">
                Aucune classe trouvée. <a href="ajouter_classe.php" class="alert-link">Ajouter une Classe</a>
            </div>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de la Classe</th>
                        <th>Niveau</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $classe): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($classe['id']); ?></td>
                            <td><?php echo htmlspecialchars($classe['nom']); ?></td>
                            <td><?php echo htmlspecialchars($classe['niveau']); ?></td>
                            <td>
                                <a href="modifier_classe.php?id=<?php echo $classe['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="supprimer_classe.php?id=<?php echo $classe['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
