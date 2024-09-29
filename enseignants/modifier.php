<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants.php');    


$id = $_GET['id'];
$enseignant = get_enseignant_by_id($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $specialite = $_POST['specialite'];
    
    modifier_enseignant($id, $nom, $prenom, $email, $specialite);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Enseignant</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Modifier un Enseignant</h2>
    <form action="" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php echo $enseignant['nom']; ?>" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?php echo $enseignant['prenom']; ?>" required>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $enseignant['email']; ?>" required>
        <label for="specialite">Spécialité</label>
        <input type="text" name="specialite" value="<?php echo $enseignant['specialite']; ?>" required>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
