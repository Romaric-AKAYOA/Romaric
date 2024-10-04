<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/inscriptions.php');

// Définir la fonction lister_etudiants si elle n'existe pas déjà
function lister_etudiants() {
    global $db;   // Assurez-vous que la connexion à la base de données est globale
    $sql = "SELECT id, nom, prenom FROM etudiants";
    $result = $db->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);  // Retourner les résultats sous forme de tableau associatif
}

function lister_cours() {
    global $db; 
    $sql = "SELECT id, nom FROM cours";
    $result = $db->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

$etudiants = lister_etudiants();  // Récupérer la liste des étudiants
$cours = lister_cours();          // Récupérer la liste des cours

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $cours_id = $_POST['cours_id'];
    
    // Fonction pour inscrire un étudiant dans un cours
    inscrire_etudiant($etudiant_id, $cours_id);
    header('Location: lister.php');  // Redirection après l'inscription
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrire un Étudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Inscrire un Étudiant à un Cours</h2>
        <form action="" method="POST" class="border p-4 shadow-sm rounded">
            <!-- Sélection de l'étudiant -->
            <div class="mb-3">
                <label for="etudiant_id" class="form-label">Étudiant</label>
                <select name="etudiant_id" class="form-select" required>
                    <option value="">Sélectionner un étudiant</option>
                    <?php foreach ($etudiants as $etudiant): ?>
                        <option value="<?php echo $etudiant['id']; ?>">
                            <?php echo $etudiant['id'] . ' - ' . $etudiant['nom'] . ' ' . $etudiant['prenom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Sélection du cours -->
            <div class="mb-3">
                <label for="cours_id" class="form-label">Cours</label>
                <select name="cours_id" class="form-select" required>
                    <option value="">Sélectionner un cours</option>
                    <?php foreach ($cours as $cour): ?>
                        <option value="<?php echo $cour['id']; ?>">
                            <?php echo $cour['id'] . ' - ' . $cour['nom']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Inscrire</button>
        </form>
    </div>

    <!-- Inclusion de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
