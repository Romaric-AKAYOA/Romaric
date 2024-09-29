<?php
session_start();
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion Scolaire</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?></h2>
        <nav>
            <ul>
                <li><a href="etudiants/lister.php">Gérer les étudiants</a></li>
                <li><a href="enseignants/lister.php">Gérer les enseignants</a></li>
                <li><a href="cours/lister.php">Gérer les cours</a></li>
                <li><a href="classes/lister.php">Gérer les classes</a></li>
                <li><a href="inscriptions/lister.php">Gérer les inscriptions</a></li>
                <li><a href="notes/lister.php">Gérer les notes</a></li>
                <li><a href="emplois_du_temps/lister.php">Gérer les emplois du temps</a></li>
                <li><a href="absences/lister.php">Gérer les absences</a></li>
                <li><a href="paiements/lister.php">Gérer les paiements</a></li>
                <li><a href="evenements/lister.php">Gérer les événements</a></li>
                <li><a href="enseignants_classes/lister.php">Gérer les enseignants et classes</a></li>
                <li><a href="login.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
