<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php'); // Assurez-vous que ce fichier contient la fonction lister_evenements()

// Appeler la fonction pour lister les événements
$evenements = lister_evenements(); // Assurez-vous que cette fonction est définie dans evenements.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
    <!-- Lien vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css"> <!-- Assurez-vous que ce chemin est correct -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Liste des Événements</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($evenements): // Vérifiez si $evenements n'est pas vide ?>
                    <?php foreach ($evenements as $evenement): ?>
                    <tr>
                        <td><?= htmlspecialchars($evenement['id']) ?></td>
                        <td><?= htmlspecialchars($evenement['titre']) ?></td>
                        <td><?= htmlspecialchars($evenement['description']) ?></td>
                        <td><?= htmlspecialchars($evenement['date_evenement']) ?></td>
                        <td><?= htmlspecialchars($evenement['lieu']) ?></td>
                        <td>
                            <a href="modifier.php?id=<?= htmlspecialchars($evenement['id']) ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=<?= htmlspecialchars($evenement['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucun événement trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Lien vers jQuery et Bootstrap JS (optionnel) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
