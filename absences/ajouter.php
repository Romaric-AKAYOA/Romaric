<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    $date_absence = $_POST['date_absence'];
    $justification = $_POST['justification'];

    // Code pour ajouter à la base de données
    $sql = "INSERT INTO absences (etudiant_id, cours_id, date_absence, justification) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification]);
    header('Location: lister.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Absence</title>
</head>
<body>
    <h1>Ajouter Absence</h1>
    <form method="POST">
        <label>Étudiant ID:</label><input type="text" name="etudiant_id" required><br>
        <label>Cours ID:</label><input type="text" name="cours_id" required><br>
        <label>Date d'Absence:</label><input type="date" name="date_absence" required><br>
        <label>Justification:</label><textarea name="justification"></textarea><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
