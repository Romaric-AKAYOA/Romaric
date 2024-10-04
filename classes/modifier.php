<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    

$id = $_GET['id'];
$classe = get_classe_by_id($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $annee_scolaire = $_POST['annee_scolaire'];
    $description = $_POST['description'];
    
    modifier_classe($id, $nom, $annee_scolaire, $description);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Classe</title>
    <!-- Inclusion de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Modifier une Classe</h2>
        <form action="" method="POST" class="border p-4 shadow-sm rounded">
            <!-- Champ Nom -->
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($classe['nom']); ?>" required>
            </div>

            <!-- Champ Année Scolaire -->
            <div class="mb-3">
                <label for="annee_scolaire" class="form-label">Année Scolaire</label>
                <input type="text" class="form-control" name="annee_scolaire" value="<?php echo htmlspecialchars($classe['annee_scolaire']); ?>" required>
            </div>

            <!-- Champ Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"><?php echo htmlspecialchars($classe['description']); ?></textarea>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="lister.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    <!-- Inclusion du script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
