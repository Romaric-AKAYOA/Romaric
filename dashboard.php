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
    <!-- Lien Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers une feuille de style personnalisée -->
    <link rel="stylesheet" href="assets/css/style.css"> 
</head>
<body>

<!-- Barre de navigation -->
<!-- Barre de navigation complète avec sous-options sous forme de liste -->
<nav class="navbar navbar-expand-lg navbar-light bg-light " >
    <div class="container">
        <a class="navbar-brand" href="#">Gestion Scolaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <!-- Gérer les étudiants -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="etudiantsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les étudiants
                    </a>
                    <div class="dropdown-menu" aria-labelledby="etudiantsDropdown">
                        <a class="dropdown-item" href="etudiants/lister.php">Lister les étudiants</a>
                        <a class="dropdown-item" href="etudiants/ajouter.php">Ajouter un étudiant</a>
                        <a class="dropdown-item" href="etudiants/modifier.php">Modifier un étudiant</a>
                    </div>
                </li>
                <!-- Gérer les enseignants -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="enseignantsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les enseignants
                    </a>
                    <div class="dropdown-menu" aria-labelledby="enseignantsDropdown">
                        <a class="dropdown-item" href="enseignants/lister.php">Lister les enseignants</a>
                        <a class="dropdown-item" href="enseignants/ajouter.php">Ajouter un enseignant</a>
                        <a class="dropdown-item" href="enseignants/modifier.php">Modifier un enseignant</a>
                    </div>
                </li>
                <!-- Gérer les cours -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="coursDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les cours
                    </a>
                    <div class="dropdown-menu" aria-labelledby="coursDropdown">
                        <a class="dropdown-item" href="cours/lister.php">Lister les cours</a>
                        <a class="dropdown-item" href="cours/ajouter.php">Ajouter un cours</a>
                        <a class="dropdown-item" href="cours/modifier.php">Modifier un cours</a>
                    </div>
                </li>
                <!-- Gérer les classes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="classesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les classes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="classesDropdown">
                        <a class="dropdown-item" href="classes/lister.php">Lister les classes</a>
                        <a class="dropdown-item" href="classes/ajouter.php">Ajouter une classe</a>
                        <a class="dropdown-item" href="classes/modifier.php">Modifier une classe</a>
                    </div>
                </li>
                <!-- Gérer les inscriptions -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="inscriptionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les inscriptions
                    </a>
                    <div class="dropdown-menu" aria-labelledby="inscriptionsDropdown">
                        <a class="dropdown-item" href="inscriptions/lister.php">Lister les inscriptions</a>
                        <a class="dropdown-item" href="inscriptions/inscrire.php">Ajouter une inscription</a>
                    </div>
                </li>
                <!-- Gérer les notes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les notes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="notesDropdown">
                        <a class="dropdown-item" href="notes/lister.php">Lister les notes</a>
                        <a class="dropdown-item" href="notes/ajouter.php">Ajouter une note</a>
                        <a class="dropdown-item" href="notes/modifier.php">Modifier une note</a>
                    </div>
                </li>
                <!-- Gérer les emplois du temps -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="emploisDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les emplois du temps
                    </a>
                    <div class="dropdown-menu" aria-labelledby="emploisDropdown">
                        <a class="dropdown-item" href="emplois_du_temps/lister.php">Lister les emplois du temps</a>
                        <a class="dropdown-item" href="emplois_du_temps/ajouter.php">Ajouter un emploi du temps</a>
                        <a class="dropdown-item" href="emplois_du_temps/modifier.php">Modifier un emploi du temps</a>
                    </div>
                </li>
                <!-- Gérer les absences -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="absencesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les absences
                    </a>
                    <div class="dropdown-menu" aria-labelledby="absencesDropdown">
                        <a class="dropdown-item" href="absences/lister.php">Lister les absences</a>
                        <a class="dropdown-item" href="absences/ajouter.php">Ajouter une absence</a>
                    </div>
                </li>
                <!-- Gérer les paiements -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="paiementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les paiements
                    </a>
                    <div class="dropdown-menu" aria-labelledby="paiementsDropdown">
                        <a class="dropdown-item" href="paiements/lister.php">Lister les paiements</a>
                        <a class="dropdown-item" href="paiements/ajouter.php">Ajouter un paiement</a>
                    </div>
                </li>
                <!-- Gérer les événements -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="evenementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les événements
                    </a>
                    <div class="dropdown-menu" aria-labelledby="evenementsDropdown">
                        <a class="dropdown-item" href="evenements/lister.php">Lister les événements</a>
                        <a class="dropdown-item" href="evenements/ajouter.php">Ajouter un événement</a>
                        <a class="dropdown-item" href="evenements/modifier.php">Modifier un événement</a>
                    </div>
                </li>
                <!-- Gérer les enseignants et classes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="enseignantsClassesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les enseignants et classes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="enseignantsClassesDropdown">
                        <a class="dropdown-item" href="enseignants_classes/lister.php">Lister les relations</a>
                        <a class="dropdown-item" href="enseignants_classes/ajouter.php">Ajouter une relation</a>
                        <a class="dropdown-item" href="enseignants_classes/modifier.php">Modifier une relation</a>
                    </div>
                </li>
                <!-- Gérer les utilisateurs -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="utilisateursDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gérer les utilisateurs
                    </a>
                    <div class="dropdown-menu" aria-labelledby="utilisateurDropdown">
                        <a class="dropdown-item" href="utilisateurs/lister.php">Lister les relations</a>
                        <a class="dropdown-item" href="utilisateurs/ajouter.php">Ajouter une relation</a>
                        <a class="dropdown-item" href="utilisateurs/modifier.php">Modifier une relation</a>
                    </div>
                </li>
                <!-- Déconnexion -->
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>




<!-- Section d'accueil avec présentation de la structure -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Bienvenue à notre Gestion Scolaire</h1>
        <p class="lead">Une solution complète pour gérer les étudiants, enseignants, cours et plus encore.</p>
    </div>
</header>

<!-- Section Présentation avec cartes Bootstrap -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Présentation de l'école -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="images\images.jpg" alt="Image école">
                    <div class="card-body">
                        <h5 class="card-title">À propos de nous</h5>
                        <p class="card-text">Notre institution offre une éducation de qualité avec un suivi personnalisé pour chaque étudiant. Nous croyons en l'excellence académique et au développement des compétences.</p>
                        <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
            </div>
            <!-- Programme scolaire -->
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="images\téléchargement.jpg" alt="Programme scolaire">
                    <div class="card-body">
                        <h5 class="card-title">Nos programmes</h5>
                        <p class="card-text">Découvrez nos programmes variés, conçus pour préparer les étudiants à exceller dans leurs domaines respectifs.</p>
                        <a href="#" class="btn btn-primary">Voir les programmes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tableau de bord - Navigation des fonctionnalités -->
<!-- Tableau de bord complet -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Tableau de Bord</h2>
        <div class="row">
            <!-- Gérer les étudiants -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les étudiants</h5>
                        <p class="card-text">Ajoutez, modifiez ou supprimez des informations concernant les étudiants.</p>
                        <a href="etudiants/lister.php" class="btn btn-primary">Lister</a>
                        <a href="etudiants/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="etudiants/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les enseignants -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les enseignants</h5>
                        <p class="card-text">Ajoutez, modifiez ou supprimez des informations concernant les enseignants.</p>
                        <a href="enseignants/lister.php" class="btn btn-primary">Lister</a>
                        <a href="enseignants/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="enseignants/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les cours -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les cours</h5>
                        <p class="card-text">Organisez et gérez les cours facilement.</p>
                        <a href="cours/lister.php" class="btn btn-primary">Lister</a>
                        <a href="cours/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="cours/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les classes -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les classes</h5>
                        <p class="card-text">Gérez facilement vos classes.</p>
                        <a href="classes/lister.php" class="btn btn-primary">Lister</a>
                        <a href="classes/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="classes/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les inscriptions -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les inscriptions</h5>
                        <p class="card-text">Suivez et gérez les inscriptions.</p>
                        <a href="inscriptions/lister.php" class="btn btn-primary">Lister</a>
                        <a href="inscriptions/inscrire.php" class="btn btn-secondary">Inscrire</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les notes -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les notes</h5>
                        <p class="card-text">Ajoutez ou modifiez les notes des étudiants.</p>
                        <a href="notes/lister.php" class="btn btn-primary">Lister</a>
                        <a href="notes/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="notes/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les absences -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les absences</h5>
                        <p class="card-text">Suivez les absences des étudiants.</p>
                        <a href="absences/lister.php" class="btn btn-primary">Lister</a>
                        <a href="absences/ajouter.php" class="btn btn-secondary">Ajouter</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les paiements -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les paiements</h5>
                        <p class="card-text">Suivez et gérez les paiements des étudiants.</p>
                        <a href="paiements/lister.php" class="btn btn-primary">Lister</a>
                        <a href="paiements/ajouter.php" class="btn btn-secondary">Ajouter</a>
                    </div>
                </div>
            </div>
            <!-- Gérer les emplois du temps -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les emplois du temps</h5>
                        <p class="card-text">Ajoutez ou modifiez les emplois du temps des cours.</p>
                        <a href="emplois_du_temps/lister.php" class="btn btn-primary">Lister</a>
                        <a href="emplois_du_temps/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="emplois_du_temps/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>

            <!-- Gérer les événements -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les événements</h5>
                        <p class="card-text">Organisez et planifiez des événements scolaires.</p>
                        <a href="evenements/lister.php" class="btn btn-primary">Lister</a>
                        <a href="evenements/ajouter.php" class="btn btn-secondary">Ajouter</a>
                    </div>
                </div>
            </div>

            <!-- Gérer les utilisateurs -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gérer les utilisateurs</h5>
                        <p class="card-text">Ajoutez ou modifiez les utilisateurss.</p>
                        <a href="utilisateurs/lister.php" class="btn btn-primary">Lister</a>
                        <a href="utilisateurs/ajouter.php" class="btn btn-secondary">Ajouter</a>
                        <a href="utilisateurs/modifier.php" class="btn btn-secondary">Modifier</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


<!-- Pied de page -->
<footer class="py-4 bg-dark text-white text-center">
    <div class="container">
        <p>&copy; 2024 Gestion Scolaire. Tous droits réservés.</p>
    </div>
</footer>

<!-- Lien Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
