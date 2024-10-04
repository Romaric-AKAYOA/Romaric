<?php
// Inclure les fichiers nécessaires (connexion à la base de données et autres fichiers)
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/emplois_du_temps.php');    

// Vérifiez si la connexion à la base de données existe
if (!$db) {
    die("Connexion échouée. Veuillez vérifier votre connexion à la base de données.");
}

// Récupérer les classes depuis la base de données
$query_classes = "SELECT id, nom FROM classes";
$result_classes = $db->query($query_classes); // Exécuter la requête

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $classe_id = $_POST['classe_id'];
    $cours_id = $_POST['cours_id'];
    $jours_semaines = implode(',', $_POST['jour_semaine']); // Combiner les jours sélectionnés en une chaîne de caractères
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];

    // Insertion dans la table emplois_du_temps avec les jours comme une chaîne de caractères
    $query = "INSERT INTO emplois_du_temps (classe_id, cours_id, jour_semaine, heure_debut, heure_fin) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->execute([$classe_id, $cours_id, $jours_semaines, $heure_debut, $heure_fin]);
    header('Location: lister.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Emploi du Temps</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ajouter Emploi du Temps</h1>
        <form method="POST" class="needs-validation" novalidate>
            <!-- Classe ID (récupérée de la base de données) -->
            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" class="form-control" required>
                    <option value="">Sélectionner une classe</option>
                    <?php
                    // Boucle pour afficher les classes dans la liste déroulante
                    if ($result_classes->rowCount() > 0) {  // Utiliser rowCount pour PDO
                        while ($row = $result_classes->fetch()) {
                            echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Cours ID -->
            <div class="form-group">
                <label for="cours_id">Cours</label>
                <select name="cours_id" class="form-control" required>
                    <option value="">Sélectionner un cours</option>
                    <option value="1">1 - Mathématiques</option>
                    <option value="2">2 - Histoire</option>
                </select>
            </div>

            <!-- Jour de la Semaine -->
            <div class="form-group">
                <label>Jours de la Semaine</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Lundi">
                    <label class="form-check-label">Lundi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Mardi">
                    <label class="form-check-label">Mardi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Mercredi">
                    <label class="form-check-label">Mercredi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Jeudi">
                    <label class="form-check-label">Jeudi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Vendredi">
                    <label class="form-check-label">Vendredi</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="jour_semaine[]" value="Samedi">
                    <label class="form-check-label">Samedi</label>
                </div>
            </div>

            <!-- Heure de Début -->
            <div class="form-group">
                <label for="heure_debut">Heure de Début</label>
                <input type="time" name="heure_debut" class="form-control" required>
            </div>

            <!-- Heure de Fin -->
            <div class="form-group">
                <label for="heure_fin">Heure de Fin</label>
                <input type="time" name="heure_fin" class="form-control" required>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
