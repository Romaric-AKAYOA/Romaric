<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    $date_absence = $_POST['date_absence'];
    $justification = $_POST['justification'];

    // Code pour mettre à jour l'enregistrement dans la base de données
    $sql = "UPDATE absences SET etudiant_id = ?, cours_id = ?, date_absence = ?, justification = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification, $id]);
    echo "Absence modifiée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Absence</title>
</head>
<body>
    <h1>Modifier Absence</h1>
    <form method="POST">
        <label>ID:</label><input type="text" name="id" required><br>
        <label>Étudiant ID:</label><input type="text" name="etudiant_id" required><br>
        <label>Cours ID:</label><input type="text" name="cours_id" required><br>
        <label>Date d'Absence:</label><input type="date" name="date_absence" required><br>
        <label>Justification:</label><textarea name="justification"></textarea><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
