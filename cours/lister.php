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
    
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Votre feuille de style personnalisée (facultatif) -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Liste des Cours</h2>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom du Cours</th>
                    <th scope="col">Enseignant</th>
                    <th scope="col">Coefficient</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($cours): // Vérifiez si $cours n'est pas vide ?>
                    <?php foreach ($cours as $cour): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($cour['id']); ?></td>
                        <!-- Utilisation correcte du nom de colonne -->
                        <td><?php echo htmlspecialchars($cour['nom']); ?></td>
                        <!-- Afficher le nom et prénom de l'enseignant -->
                        <td><?php echo htmlspecialchars($cour['nom_enseignant'] . ' ' . $cour['prenom_enseignant']); ?></td>
                        <!-- Afficher le coefficient -->
                        <td><?php echo htmlspecialchars($cour['coefficient']); ?></td>
                        <td>
                            <a href="modifier.php?id=<?php echo $cour['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=<?php echo $cour['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucun cours trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

