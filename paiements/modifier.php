<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/paiements.php');

// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $etudiant_id = $_POST['etudiant_id'];
    $montant = $_POST['montant'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];

    // Code pour mettre à jour l'enregistrement dans la base de données
    modifierPaiement($id, $montant, $description, $statut) ;
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Paiement</title>
</head>
<body>
    <h1>Modifier Paiement</h1>
    <form method="POST">
        <label>ID du Paiement:</label><input type="text" name="id" required><br>
        <label>Étudiant ID:</label><input type="text" name="etudiant_id" required><br>
        <label>Montant:</label><input type="text" name="montant" required><br>
        <label>Description:</label><textarea name="description"></textarea><br>
        <label>Statut:</label>
        <select name="statut">
            <option value="Payé">Payé</option>
            <option value="Impayé">Impayé</option>
        </select><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
