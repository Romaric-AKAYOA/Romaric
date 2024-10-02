<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/cours.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants.php');

$id = $_GET['id'];
$cours = get_cours_by_id($id);
$enseignants = lister_enseignants();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $enseignant_id = $_POST['enseignant_id'];
    $coefficient = $_POST['coefficient'];  // Ajout du coefficient

    modifier_cours($id, $nom, $description, $enseignant_id, $coefficient);  // Inclure le coefficient
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Cours</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Modifier un Cours</h2>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="<?php echo htmlspecialchars($cours['nom']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required><?php echo htmlspecialchars($cours['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="enseignant_id" class="form-label">Enseignant</label>
                <select name="enseignant_id" class="form-select" required>
                    <?php foreach ($enseignants as $enseignant): ?>
                    <option value="<?php echo $enseignant['id']; ?>" <?php if ($cours['enseignant_id'] == $enseignant['id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($enseignant['nom'] . ' ' . $enseignant['prenom']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="coefficient" class="form-label">Coefficient</label>
                <input type="number" step="0.01" name="coefficient" class="form-control" value="<?php echo htmlspecialchars($cours['coefficient']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
