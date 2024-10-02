<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants.php');    

// Récupérer la liste des enseignants
$enseignants = lister_enseignants();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Enseignants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Liste des Enseignants</h2>
        
        <?php if (empty($enseignants)): ?>
            <div class="alert alert-warning" role="alert">
                Aucun enseignant trouvé. <a href="ajouter_enseignant.php" class="alert-link">Ajouter un Enseignant</a>
            </div>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enseignants as $enseignant): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($enseignant['id']); ?></td>
                            <td><?php echo htmlspecialchars($enseignant['nom']); ?></td>
                            <td><?php echo htmlspecialchars($enseignant['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($enseignant['email']); ?></td>
                            <td><?php echo htmlspecialchars($enseignant['telephone']); ?></td>
                            <td><?php echo htmlspecialchars($enseignant['adresse']); ?></td>
                            <td>
                                <a href="modifier_enseignant.php?id=<?php echo $enseignant['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="supprimer_enseignant.php?id=<?php echo $enseignant['id']; ?>" class="btn btn-danger btn-sm">Supprimer</a>
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
