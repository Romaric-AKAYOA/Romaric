<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/notes.php');

// Appeler la fonction pour lister les notes
$notes = lister_notes(); // Vérifiez que cette fonction est bien définie dans notes.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Notes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Liste des Notes</h1>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Étudiant</th>
                    <th>Cours</th>
                    <th>Note</th>
                    <th>Date d'enregistrement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($notes)): // Vérifier si $notes n'est pas vide ?>
                    <?php foreach ($notes as $note): ?>
                    <tr>
                        <td><?= htmlspecialchars($note['id']); ?></td>
                        <td><?= htmlspecialchars($note['etudiant_nom'] . ' ' . htmlspecialchars($note['etudiant_prenom'])); ?></td>
                        <td><?= htmlspecialchars($note['cours_nom']); ?></td>
                        <td><?= htmlspecialchars($note['note']); ?></td>
                        <td><?= htmlspecialchars($note['date_enregistrement']); ?></td>
                        <td>
                            <a href="modifier.php?id=<?= $note['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=<?= $note['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette note ?');">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Aucune note trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
