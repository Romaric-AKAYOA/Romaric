<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/cours.php');

// Connexion à la base de données et récupération des enseignants
try {
    $db = new PDO('mysql:host=localhost;dbname=nom_base_de_donnees', 'utilisateur', 'mot_de_passe');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupérer les enseignants depuis la table enseignants
    $sql = "SELECT id, nom, prenom FROM enseignants";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    $enseignants = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Récupère tous les enseignants dans un tableau associatif
    
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

// Gestion de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $enseignant_id = $_POST['enseignant_id'];
    $coefficient = $_POST['coefficient'];  // Ajout du coefficient

    // Appel à la fonction pour ajouter un cours avec coefficient
    ajouter_cours($nom, $description, $enseignant_id, $coefficient);
    
    // Redirection après l'ajout
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Votre feuille de style personnalisée (facultatif) -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Ajouter un Cours</h2>
        
        <!-- Formulaire d'ajout de cours -->
        <form action="" method="POST" class="p-4 shadow rounded bg-light">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom du Cours</label>
                <input type="text" name="nom" class="form-control" id="nom" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="enseignant_id" class="form-label">Enseignant</label>
                <select name="enseignant_id" class="form-select" id="enseignant_id" required>
                    <option value="">Sélectionner un enseignant</option>
                    <?php foreach ($enseignants as $enseignant): ?>
                    <option value="<?php echo htmlspecialchars($enseignant['id']); ?>">
                        <?php echo htmlspecialchars($enseignant['nom'] . ' ' . $enseignant['prenom']); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ajout du champ Coefficient -->
            <div class="mb-3">
                <label for="coefficient" class="form-label">Coefficient</label>
                <input type="number" step="0.01" name="coefficient" class="form-control" id="coefficient" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Ajouter le Cours</button>
            </div>
        </form>
    </div>

    <!-- Inclure Bootstrap JS (facultatif pour des composants JS comme les modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
