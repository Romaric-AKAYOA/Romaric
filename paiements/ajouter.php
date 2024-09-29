<?php
// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $montant = $_POST['montant'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];

    // Code pour ajouter à la base de données
    $sql = "INSERT INTO paiements (etudiant_id, montant, description, statut) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$etudiant_id, $montant, $description, $statut]);
    echo "Paiement ajouté avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Paiement</title>
</head>
<body>
    <h1>Ajouter Paiement</h1>
    <form method="POST">
        <label>Étudiant ID:</label><input type="text" name="etudiant_id" required><br>
        <label>Montant:</label><input type="text" name="montant" required><br>
        <label>Description:</label><textarea name="description"></textarea><br>
        <label>Statut:</label>
        <select name="statut">
            <option value="Payé">Payé</option>
            <option value="Impayé">Impayé</option>
        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
