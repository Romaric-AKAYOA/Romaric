<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/emplois_du_temps.php');    

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classe_id = $_POST['classe_id'];
    $cours_id = $_POST['cours_id'];
    $jour_semaine = $_POST['jour_semaine'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $salle = $_POST['salle'];

    // Code pour ajouter à la base de données
    // ...
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter Emploi du Temps</title>
</head>
<body>
    <h1>Ajouter Emploi du Temps</h1>
    <form method="POST">
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
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
