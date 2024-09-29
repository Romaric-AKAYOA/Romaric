<?php
// modifier.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $classe_id = $_POST['classe_id'];
    $cours_id = $_POST['cours_id'];
    $jour_semaine = $_POST['jour_semaine'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $salle = $_POST['salle'];

    // Code pour mettre à jour l'enregistrement dans la base de données
    $sql = "UPDATE emplois_du_temps SET classe_id = ?, cours_id = ?, jour_semaine = ?, heure_debut = ?, heure_fin = ?, salle = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin, $salle, $id]);
    echo "Emploi du temps modifié avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Emploi du Temps</title>
</head>
<body>
    <h1>Modifier Emploi du Temps</h1>
    <form method="POST">
        <label>ID:</label><input type="text" name="id" required><br>
        <label>Classe ID:</label><input type="text" name="classe_id" required><br>
        <label>Cours ID:</label><input type="text" name="cours_id" required><br>
        <label>Jour de la Semaine:</label>
        <select name="jour_semaine" required>
            <option value="Lundi">Lundi</option>
            <option value="Mardi">Mardi</option>
            <option value="Mercredi">Mercredi</option>
            <option value="Jeudi">Jeudi</option>
            <option value="Vendredi">Vendredi</option>
            <option value="Samedi">Samedi</option>
        </select><br>
        <label>Heure de Début:</label><input type="time" name="heure_debut" required><br>
        <label>Heure de Fin:</label><input type="time" name="heure_fin" required><br>
        <label>Salle:</label><input type="text" name="salle"><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
