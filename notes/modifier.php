<?php
include('../../src/db.php');
include('../../src/notes.php');
include('../../src/etudiants.php');
include('../../src/cours.php');

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
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Modifier une Note</h2>
    <form action="" method="POST">
        <label for="etudiant_id">Étudiant</label>
        <select name="etudiant_id" required>
            <option value="">Sélectionner un étudiant</option>
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?php echo $etudiant['id']; ?>" <?php echo $note['etudiant_id'] == $etudiant['id'] ? 'selected' : ''; ?>>
                    <?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <label for="cours_id">Cours</label>
        <select name="cours_id" required>
            <option value="">Sélectionner un cours</option>
            <?php foreach ($cours as $cours): ?>
                <option value="<?php echo $cours['id']; ?>" <?php echo $note['cours_id'] == $cours['id'] ? 'selected' : ''; ?>>
                    <?php echo $cours['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="note">Note</label>
        <input type="number" name="note" step="0.01" min="0" max="20" value="<?php echo $note['note']; ?>" required>

        <button type="submit">Modifier</button>
    </form>
</body>
</html>
