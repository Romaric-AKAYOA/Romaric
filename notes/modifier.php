<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/notes.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/etudiants.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/cours.php');

$id = $_GET['id'];
$note = recuperer_note($id);
$etudiants = lister_etudiants();
$cours = lister_cours();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    $note_value = $_POST['note'];
    
    modifier_note($id, $etudiant_id, $cours_id, $note_value);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Note</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier une Note</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="etudiant_id">Étudiant</label>
                <select name="etudiant_id" class="form-control" required>
                    <option value="">Sélectionner un étudiant</option>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value="<?php echo $etudiant['id']; ?>" <?php echo $note['etudiant_id'] == $etudiant['id'] ? 'selected' : ''; ?>>
                            <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cours_id">Cours</label>
                <select name="cours_id" class="form-control" required>
                    <option value="">Sélectionner un cours</option>
                    <?php foreach ($cours as $cours): ?>
                        <option value="<?php echo $cours['id']; ?>" <?php echo $note['cours_id'] == $cours['id'] ? 'selected' : ''; ?>>
                            <?php echo $cours['nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="number" name="note" class="form-control" step="0.01" min="0" max="20" value="<?php echo $note['note']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
