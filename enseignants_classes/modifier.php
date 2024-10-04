<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants_classes.php');  // Mise à jour ici

// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $enseignant_id = $_POST['enseignant_id'];
    $classe_id = $_POST['classe_id'];

    // Code pour mettre à jour la relation dans la base de données
    modifierEnseignantClasse($id, $enseignant_id, $classe_id) ;
    header('Location: lister.php'); // Redirige vers la liste des enseignants après l'ajout
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Enseignant-Classe</title>
</head>
<body>
    <h1>Modifier Relation Enseignant-Classe</h1>
    <form method="POST">
        <label>ID Relation:</label><input type="text" name="id" required><br>
        <label>ID Enseignant:</label><input type="text" name="enseignant_id" required><br>
        <label>ID Classe:</label><input type="text" name="classe_id" required><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
