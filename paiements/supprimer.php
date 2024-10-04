<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/paiements.php');

// supprimer.php
$id = $_GET['id'];
supprimerPaiement($id);
header('Location: lister.php');
exit();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer Paiement</title>
</head>
<body>
    <h1>Supprimer Paiement</h1>
    <form method="POST">
        <label>ID du Paiement à Supprimer:</label><input type="text" name="id" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
