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
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Assurez-vous que le chemin est correct -->
</head>
<body>
    <div class="dashboard-container">
        <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?></h2>
        <nav>
            <ul>
                <li>
                    <a href="etudiants/lister.php">Gérer les étudiants</a>
                    <ul>
                        <li><a href="etudiants/ajouter.php">Ajouter un étudiant</a></li>
                        <li><a href="etudiants/modifier.php">Modifier un étudiant</a></li>
                    </ul>
                </li>
                <li>
                    <a href="enseignants/lister.php">Gérer les enseignants</a>
                    <ul>
                        <li><a href="enseignants/ajouter.php">Ajouter un enseignant</a></li>
                        <li><a href="enseignants/modifier.php">Modifier un enseignant</a></li>
                    </ul>
                </li>
                <li>
                    <a href="cours/lister.php">Gérer les cours</a>
                    <ul>
                        <li><a href="cours/ajouter.php">Ajouter un cours</a></li>
                        <li><a href="cours/modifier.php">Modifier un cours</a></li>
                    </ul>
                </li>
                <li>
                    <a href="classes/lister.php">Gérer les classes</a>
                    <ul>
                        <li><a href="classes/ajouter.php">Ajouter une classe</a></li>
                        <li><a href="classes/modifier.php">Modifier une classe</a></li>
                    </ul>
                </li>
                <li>
                    <a href="inscriptions/lister.php">Gérer les inscriptions</a>
                    <ul>
                        <li><a href="inscriptions/ajouter.php">Ajouter une inscription</a></li>
                        <li><a href="inscriptions/modifier.php">Modifier une inscription</a></li>
                    </ul>
                </li>
                <li>
                    <a href="notes/lister.php">Gérer les notes</a>
                    <ul>
                        <li><a href="notes/ajouter.php">Ajouter une note</a></li>
                        <li><a href="notes/modifier.php">Modifier une note</a></li>
                    </ul>
                </li>
                <li>
                    <a href="emplois_du_temps/lister.php">Gérer les emplois du temps</a>
                    <ul>
                        <li><a href="emplois_du_temps/ajouter.php">Ajouter un emploi du temps</a></li>
                        <li><a href="emplois_du_temps/modifier.php">Modifier un emploi du temps</a></li>
                    </ul>
                </li>
                <li>
                    <a href="absences/lister.php">Gérer les absences</a>
                    <ul>
                        <li><a href="absences/ajouter.php">Ajouter une absence</a></li>
                        <li><a href="absences/modifier.php">Modifier une absence</a></li>
                    </ul>
                </li>
                <li>
                    <a href="paiements/lister.php">Gérer les paiements</a>
                    <ul>
                        <li><a href="paiements/ajouter.php">Ajouter un paiement</a></li>
                        <li><a href="paiements/modifier.php">Modifier un paiement</a></li>
                    </ul>
                </li>
                <li>
                    <a href="evenements/lister.php">Gérer les événements</a>
                    <ul>
                        <li><a href="evenements/ajouter.php">Ajouter un événement</a></li>
                        <li><a href="evenements/modifier.php">Modifier un événement</a></li>
                    </ul>
                </li>
                <li>
                    <a href="enseignants_classes/lister.php">Gérer les enseignants et classes</a>
                    <ul>
                        <li><a href="enseignants_classes/ajouter.php">Ajouter une relation</a></li>
                        <li><a href="enseignants_classes/modifier.php">Modifier une relation</a></li>
                    </ul>
                </li>
                <li><a href="login.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
