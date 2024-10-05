<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/emplois_du_temps.php');

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Appeler la fonction pour récupérer les détails de l'emploi du temps
    $emploi = get_emploi_by_id($id);
} else {
    // Redirection si l'ID est manquant
    header('Location: lister.php');
    exit();
}

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $classe_id = $_POST['classe_id'];
    $cours_id = $_POST['cours_id'];
    $jour_semaine = isset($_POST['jour_semaine']) ? implode(',', $_POST['jour_semaine']) : '';
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];

    // Appeler la fonction pour modifier l'emploi du temps
    modifierEmploiDuTemps($id, $classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin);
    // Redirection après la mise à jour
    header('Location: lister.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Emploi du Temps</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond claire */
        }
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Modifier Emploi du Temps</h1>
        <form method="POST" class="needs-validation" novalidate>
            <!-- Classe ID (récupérée de la base de données) -->
            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" class="form-control" required>
                    <option value="">Sélectionner une classe</option>
                    <?php
                    // Récupérer les classes de la base de données
                    $result_classes = get_classes(); // Assurez-vous d'avoir cette fonction
                    if ($result_classes->rowCount() > 0) {
                        while ($row = $result_classes->fetch()) {
                            // Vérifiez si la classe est celle à modifier
                            $selected = ($row['id'] == $emploi['classe_id']) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . htmlspecialchars($row['nom']) . '</option>';
                        }
                    } else {
                        echo '<option value="">Aucune classe disponible</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Cours ID -->
            <div class="form-group">
                <label for="cours_id">Cours</label>
                <select name="cours_id" class="form-control" required>
                    <option value="">Sélectionner un cours</option>
                    <?php
                    // Récupérer les cours de la base de données
                    $result_cours = get_cours(); // Assurez-vous d'avoir cette fonction
                    if ($result_cours->rowCount() > 0) {
                        while ($row = $result_cours->fetch()) {
                            // Vérifiez si le cours est celui à modifier
                            $selected = ($row['id'] == $emploi['cours_id']) ? 'selected' : '';
                            echo '<option value="' . $row['id'] . '" ' . $selected . '>' . htmlspecialchars($row['nom']) . '</option>';
                        }
                    } else {
                        echo '<option value="">Aucun cours disponible</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Jour de la Semaine -->
            <div class="form-group">
                <label>Jours de la Semaine</label><br>
                <?php
                $jours = ['Lundi' => 'Lundi', 'Mardi' => 'Mardi', 'Mercredi' => 'Mercredi', 'Jeudi' => 'Jeudi', 'Vendredi' => 'Vendredi', 'Samedi' => 'Samedi'];
                $jours_selec = explode(',', $emploi['jour_semaine']); // Supposons que les jours sont stockés comme une chaîne
                foreach ($jours as $key => $jour) {
                    $checked = in_array($key, $jours_selec) ? 'checked' : '';
                    echo '<div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="' . $key . '" ' . $checked . '>
                            <label class="form-check-label">' . htmlspecialchars($jour) . '</label>
                          </div>';
                }
                ?>
            </div>

            <!-- Heure de Début -->
            <div class="form-group">
                <label for="heure_debut">Heure de Début</label>
                <input type="time" name="heure_debut" class="form-control" value="<?php echo htmlspecialchars($emploi['heure_debut']); ?>" required>
            </div>

            <!-- Heure de Fin -->
            <div class="form-group">
                <label for="heure_fin">Heure de Fin</label>
                <input type="time" name="heure_fin" class="form-control" value="<?php echo htmlspecialchars($emploi['heure_fin']); ?>" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
