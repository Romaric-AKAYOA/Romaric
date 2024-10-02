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
    
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Votre feuille de style personnalisée (facultatif) -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Enseignants</h2>
        
        <!-- Table Bootstrap -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th> <!-- Attribut ajouté -->
                    <th>Adresse</th> <!-- Attribut ajouté -->
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
                        <td><?php echo htmlspecialchars($enseignant['telephone']); ?></td> <!-- Affichage du téléphone -->
                        <td><?php echo htmlspecialchars($enseignant['adresse']); ?></td> <!-- Affichage de l'adresse -->
                        <td>
                            <a href="modifier.php?id=<?php echo $enseignant['id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="supprimer.php?id=<?php echo $enseignant['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun enseignant trouvé.</td> <!-- Mise à jour de la colonne pour inclure toutes les colonnes -->
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclure Bootstrap JS (facultatif pour des composants JS comme les modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
