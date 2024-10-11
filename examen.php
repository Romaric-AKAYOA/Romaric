<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
        <!-- Lien Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lien vers une feuille de style personnalisée -->
    <link rel="stylesheet" href="assets/css/style.css"> 
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">Tableau de Bord</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <!-- Gérer les étudiants -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="etudiantsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les étudiants
                </a>
                <div class="dropdown-menu" aria-labelledby="etudiantsDropdown">
                    <a class="dropdown-item" href="etudiants/lister.php">Lister</a>
                    <a class="dropdown-item" href="etudiants/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="etudiants/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les enseignants -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="enseignantsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les enseignants
                </a>
                <div class="dropdown-menu" aria-labelledby="enseignantsDropdown">
                    <a class="dropdown-item" href="enseignants/lister.php">Lister</a>
                    <a class="dropdown-item" href="enseignants/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="enseignants/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les cours -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="coursDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les cours
                </a>
                <div class="dropdown-menu" aria-labelledby="coursDropdown">
                    <a class="dropdown-item" href="cours/lister.php">Lister</a>
                    <a class="dropdown-item" href="cours/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="cours/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les classes -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="classesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les classes
                </a>
                <div class="dropdown-menu" aria-labelledby="classesDropdown">
                    <a class="dropdown-item" href="classes/lister.php">Lister</a>
                    <a class="dropdown-item" href="classes/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="classes/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les inscriptions -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="inscriptionsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les inscriptions
                </a>
                <div class="dropdown-menu" aria-labelledby="inscriptionsDropdown">
                    <a class="dropdown-item" href="inscriptions/lister.php">Lister</a>
                    <a class="dropdown-item" href="inscriptions/inscrire.php">Inscrire</a>
                </div>
            </li>

            <!-- Gérer les notes -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les notes
                </a>
                <div class="dropdown-menu" aria-labelledby="notesDropdown">
                    <a class="dropdown-item" href="notes/lister.php">Lister</a>
                    <a class="dropdown-item" href="notes/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="notes/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les absences -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="absencesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les absences
                </a>
                <div class="dropdown-menu" aria-labelledby="absencesDropdown">
                    <a class="dropdown-item" href="absences/lister.php">Lister</a>
                    <a class="dropdown-item" href="absences/ajouter.php">Ajouter</a>
                </div>
            </li>

            <!-- Gérer les paiements -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="paiementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les paiements
                </a>
                <div class="dropdown-menu" aria-labelledby="paiementsDropdown">
                    <a class="dropdown-item" href="paiements/lister.php">Lister</a>
                    <a class="dropdown-item" href="paiements/ajouter.php">Ajouter</a>
                </div>
            </li>

            <!-- Gérer les emplois du temps -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="emploisDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les emplois du temps
                </a>
                <div class="dropdown-menu" aria-labelledby="emploisDropdown">
                    <a class="dropdown-item" href="emplois_du_temps/lister.php">Lister</a>
                    <a class="dropdown-item" href="emplois_du_temps/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="emplois_du_temps/modifier.php">Modifier</a>
                </div>
            </li>

            <!-- Gérer les événements -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="evenementsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les événements
                </a>
                <div class="dropdown-menu" aria-labelledby="evenementsDropdown">
                    <a class="dropdown-item" href="evenements/lister.php">Lister</a>
                    <a class="dropdown-item" href="evenements/ajouter.php">Ajouter</a>
                </div>
            </li>

            <!-- Gérer les utilisateurs -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="utilisateursDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gérer les utilisateurs
                </a>
                <div class="dropdown-menu" aria-labelledby="utilisateursDropdown">
                    <a class="dropdown-item" href="utilisateurs/lister.php">Lister</a>
                    <a class="dropdown-item" href="utilisateurs/ajouter.php">Ajouter</a>
                    <a class="dropdown-item" href="utilisateurs/modifier.php">Modifier</a>
                </div>
            </li>
                                <!-- Onglet Utilisateur -->
                                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Utilisateur
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">Utilisateur connecté</a>
                            <a class="dropdown-item" href="login.php">Déconnexion</a>
                        </div>
                    </li>

        </ul>
        
    </div>
</nav>
    <div class="container mt-5">
        <h1 class="text-center">Résultats des Étudiants</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Classe</th>
                        <th>Moyenne</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php'); // Fichier pour établir la connexion à la base de données

                    $query = "
                        SELECT e.id, e.nom, e.prenom, e.email, c.nom AS classe, 
                               AVG(n.note) AS moyenne
                        FROM etudiants e
                        LEFT JOIN inscriptions i ON e.id = i.etudiant_id
                        LEFT JOIN cours c ON i.cours_id = c.id
                        LEFT JOIN notes n ON e.id = n.etudiant_id
                        GROUP BY e.id
                    ";

                    $result = $db->query($query);
                    $etudiants = $result->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($etudiants as $etudiant) {
                        echo "<tr>
                                <td>{$etudiant['nom']}</td>
                                <td>{$etudiant['prenom']}</td>
                                <td>{$etudiant['email']}</td>
                                <td>{$etudiant['classe']}</td>
                                <td>" . ($etudiant['moyenne'] ? number_format($etudiant['moyenne'], 2) : 'N/A') . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
