<?php
include('../../src/db.php');
include('../../src/cours.php');
$enseignants = lister_enseignants();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $enseignant_id = $_POST['enseignant_id'];
    
    ajouter_cours($nom, $description, $enseignant_id);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Ajouter un Cours</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" required>
        <label for="description">Description</label>
        <textarea name="description" required></textarea>
        <label for="enseignant_id">Enseignant</label>
        <select name="enseignant_id" required>
            <option value="">Sélectionner un enseignant</option>
            <?php foreach ($enseignants as $enseignant): ?>
            <option value="<?php echo $enseignant['id']; ?>"><?php echo $enseignant['nom'] . ' ' . $enseignant['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
