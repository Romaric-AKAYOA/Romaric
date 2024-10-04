<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants_classes.php');  // Mise à jour ici

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enseignant_id = $_POST['enseignant_id'];
    $classe_id = $_POST['classe_id'];

    // Code pour ajouter à la base de données
    assignerEnseignantClasse($enseignant_id, $classe_id) ;
    header('Location: lister.php'); // Redirige vers la liste des enseignants après l'ajout
    exit();
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Enseignant-Classe</title>
</head>
<body>
    <h1>Ajouter Relation Enseignant-Classe</h1>
    <form method="POST">
        <label>ID Enseignant:</label><input type="text" name="enseignant_id" required><br>
        <label>ID Classe:</label><input type="text" name="classe_id" required><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
