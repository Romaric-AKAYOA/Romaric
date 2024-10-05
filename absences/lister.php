<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// Appeler la fonction pour lister les absences
$absences = lister_absences(); // Assurez-vous que cette fonction récupère les données nécessaires (nom/prénom étudiant et nom du cours)
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Absences</title>
    <!-- Inclure Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Liste des Absences</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Étudiant</th> <!-- Nom et prénom de l'étudiant -->
                    <th>Cours</th> <!-- Nom du cours -->
                    <th>Date d'Absence</th>
                    <th>Justification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($absences): // Vérifier si $absences contient des données ?>
                    <?php foreach ($absences as $absence): ?>
                    <tr>
                        <td><?= htmlspecialchars($absence['id']) ?></td>
                        <td><?= htmlspecialchars($absence['nom_etudiant']) ?> <?= htmlspecialchars($absence['prenom_etudiant']) ?></td> <!-- Nom et prénom -->
                        <td><?= htmlspecialchars($absence['nom']) ?></td> <!-- Nom du cours -->
                        <td><?= htmlspecialchars($absence['date_absence']) ?></td>
                        <td><?= htmlspecialchars($absence['justification']) ?></td>
                        <td>
                            <a href="modifier.php?id=<?= htmlspecialchars($absence['id']) ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=<?= htmlspecialchars($absence['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette absence ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune absence trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
