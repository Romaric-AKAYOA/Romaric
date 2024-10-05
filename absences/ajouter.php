<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// Récupérer la liste des étudiants et des cours
$sql_etudiants = "SELECT id, nom , prenom FROM etudiants";
$stmt_etudiants = $db->query($sql_etudiants);
$etudiants = $stmt_etudiants->fetchAll(PDO::FETCH_ASSOC);

$sql_cours = "SELECT id, nom FROM cours";
$stmt_cours = $db->query($sql_cours);
$cours = $stmt_cours->fetchAll(PDO::FETCH_ASSOC);

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    $date_absence = $_POST['date_absence'];
    $justification = $_POST['justification'];

    // Code pour ajouter à la base de données

    ajouterAbsence($etudiant_id, $cours_id, $date_absence, $justification) ;

    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Absence</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Ajouter Absence</h1>
        <form method="POST">
            <!-- Sélection d'étudiant avec clé-valeur -->
            <div class="form-group">
                <label for="etudiant_id">Étudiant:</label>
                <select class="form-control" name="etudiant_id" id="etudiant_id" required>
                    <option value="">Sélectionner un étudiant</option>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value="<?= htmlspecialchars($etudiant['id']) ?>">
                            <?= htmlspecialchars($etudiant['nom']) ?> <?= htmlspecialchars($etudiant['prenom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Sélection de cours avec clé-valeur -->
            <div class="form-group">
                <label for="cours_id">Cours:</label>
                <select class="form-control" name="cours_id" id="cours_id" required>
                    <option value="">Sélectionner un cours</option>
                    <?php foreach ($cours as $cour): ?>
                        <option value="<?= htmlspecialchars($cour['id']) ?>"><?= htmlspecialchars($cour['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date_absence">Date d'Absence:</label>
                <input type="date" class="form-control" name="date_absence" id="date_absence" required>
            </div>
            <div class="form-group">
                <label for="justification">Justification:</label>
                <textarea class="form-control" name="justification" id="justification"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
