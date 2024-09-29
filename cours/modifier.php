<?php
include('../../src/db.php');
include('../../src/cours.php');
include('../../src/enseignants.php');

$id = $_GET['id'];
$cours = get_cours_by_id($id);
$enseignants = lister_enseignants();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $enseignant_id = $_POST['enseignant_id'];
    
    modifier_cours($id, $nom, $description, $enseignant_id);
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
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Modifier un Cours</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php echo $cours['nom']; ?>" required>
        <label for="description">Description</label>
        <textarea name="description" required><?php echo $cours['description']; ?></textarea>
        <label for="enseignant_id">Enseignant</label>
        <select name="enseignant_id" required>
            <?php foreach ($enseignants as $enseignant): ?>
            <option value="<?php echo $enseignant['id']; ?>" <?php if ($cours['enseignant_id'] == $enseignant['id']) echo 'selected'; ?>>
                <?php echo $enseignant['nom'] . ' ' . $enseignant['prenom']; ?>
            </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
