<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/inscriptions.php');


$etudiants = lister_etudiants();
$cours = lister_cours();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    
    inscrire_etudiant($etudiant_id, $cours_id);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrire un Étudiant</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Inscrire un Étudiant à un Cours</h2>
    <form action="" method="POST">
        <label for="etudiant_id">Étudiant</label>
        <select name="etudiant_id" required>
            <option value="">Sélectionner un étudiant</option>
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?php echo $etudiant['id']; ?>"><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="cours_id">Cours</label>
        <select name="cours_id" required>
            <option value="">Sélectionner un cours</option>
            <?php foreach ($cours as $cours): ?>
                <option value="<?php echo $cours['id']; ?>"><?php echo $cours['nom']; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Inscrire</button>
    </form>
</body>
</html>
