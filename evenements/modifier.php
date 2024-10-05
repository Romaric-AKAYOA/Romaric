<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/evenements.php');

// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_evenement = $_POST['date_evenement'];
    $lieu = $_POST['lieu'];

    modifierEvenement($id, $titre, $description, $date_evenement, $lieu);
    header('Location: lister.php');
    exit();
}

// Vérifier si l'ID de l'événement est passé dans l'URL
if (isset($_GET['id'])) {
    $id_evenement = $_GET['id'];
    $evenement = obtenirEvenement($id_evenement); // Assurez-vous que cette fonction est définie
} else {
    // Rediriger si aucun ID n'est spécifié
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Événement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Modifier Événement</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($evenement['id']) ?>"> <!-- Champ caché pour l'ID -->
            <div class="form-group">
                <label>Titre:</label>
                <input type="text" class="form-control" name="titre" value="<?= htmlspecialchars($evenement['titre']) ?>" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" name="description"><?= htmlspecialchars($evenement['description']) ?></textarea>
            </div>
            <div class="form-group">
                <label>Date de l'Événement:</label>
                <input type="date" class="form-control" name="date_evenement" value="<?= htmlspecialchars($evenement['date_evenement']) ?>" required>
            </div>
            <div class="form-group">
                <label>Lieu:</label>
                <input type="text" class="form-control" name="lieu" value="<?= htmlspecialchars($evenement['lieu']) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
