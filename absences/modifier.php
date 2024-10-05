<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// Récupérer l'ID de l'absence via l'URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Récupérer les détails de l'absence à modifier
    $sql = "SELECT * FROM absences WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    $absence = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$absence) {
        echo "Absence non trouvée.";
        exit;
    }

    // Récupérer la liste des étudiants (nom et prénom)
    $sql_etudiants = "SELECT id, nom, prenom FROM etudiants";
    $stmt_etudiants = $db->query($sql_etudiants);
    $etudiants = $stmt_etudiants->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer la liste des cours
    $sql_cours = "SELECT id, nom FROM cours";
    $stmt_cours = $db->query($sql_cours);
    $cours = $stmt_cours->fetchAll(PDO::FETCH_ASSOC);

    // Lorsque le formulaire est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $etudiant_id = $_POST['etudiant_id'];
        $cours_id = $_POST['cours_id'];
        $date_absence = $_POST['date_absence'];
        $justification = $_POST['justification'];

        // Code pour mettre à jour l'enregistrement dans la base de données
        $sql = "UPDATE absences SET etudiant_id = ?, cours_id = ?, date_absence = ?, justification = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification, $id]);
        echo "Absence modifiée avec succès!";
        header('Location: lister.php');
        exit();
    }
} else {
    echo "ID de l'absence non fourni.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Absence</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier Absence</h1>
        <form method="POST">
            <!-- Sélection d'étudiant avec clé-valeur (nom + prénom) -->
            <div class="form-group">
                <label for="etudiant_id">Étudiant:</label>
                <select class="form-control" name="etudiant_id" id="etudiant_id" required>
                    <option value="">Sélectionner un étudiant</option>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value="<?= htmlspecialchars($etudiant['id']) ?>" <?= ($absence['etudiant_id'] == $etudiant['id']) ? 'selected' : '' ?>>
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
                        <option value="<?= htmlspecialchars($cour['id']) ?>" <?= ($absence['cours_id'] == $cour['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cour['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Champ pour la date d'absence -->
            <div class="form-group">
                <label for="date_absence">Date d'Absence:</label>
                <input type="date" class="form-control" name="date_absence" id="date_absence" value="<?= htmlspecialchars($absence['date_absence']) ?>" required>
            </div>

            <!-- Justification -->
            <div class="form-group">
                <label for="justification">Justification:</label>
                <textarea class="form-control" name="justification" id="justification"><?= htmlspecialchars($absence['justification']) ?></textarea>
            </div>

            <!-- Bouton de modification -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
