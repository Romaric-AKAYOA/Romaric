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
    <!-- Inclusion de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Liste des Inscriptions</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
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
                            <a href="desinscrire.php?id=<?php echo $inscription['id']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?');">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune inscription trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclusion de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
