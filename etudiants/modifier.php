<?php
include('../../src/db.php');
include('../../src/etudiants.php');

$id = $_GET['id'];
$etudiant = get_etudiant_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];

    modifier_etudiant($id, $nom, $prenom, $date_naissance, $email);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Étudiant</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <form action="modifier.php?id=<?php echo $id; ?>" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?php echo $etudiant['nom']; ?>" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?php echo $etudiant['prenom']; ?>" required>
        <label for="date_naissance">Date de Naissance</label>
        <input type="date" name="date_naissance" value="<?php echo $etudiant['date_naissance']; ?>" required>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $etudiant['email']; ?>" required>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
