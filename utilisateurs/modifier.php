<?php
// Inclure le fichier de connexion à la base de données
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');

// Vérifier si l'ID est passé dans l'URL via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations de l'utilisateur par son ID
    $sql = "SELECT * FROM utilisateurs WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Récupérer l'utilisateur à modifier
    $utilisateur = $stmt->fetch();

    // Si l'utilisateur n'existe pas, afficher un message d'erreur
    if (!$utilisateur) {
        echo "Utilisateur non trouvé.";
        exit();
    }
} else {
    echo "ID non spécifié.";
    exit();
}

// Gérer la soumission du formulaire pour modifier les données
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Mettre à jour les informations de l'utilisateur dans la base de données
    $sql = "UPDATE utilisateurs SET nom = :nom, email = :email, role = :role WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Utilisateur mis à jour avec succès.";
        // Redirection après la mise à jour
        header("Location: lister.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Modifier un Utilisateur</h2>
        <form action="" method="POST">
            <!-- Champ ID non modifiable, affiché en lecture seule -->
            <div class="form-group">
                <label for="id">ID Utilisateur</label>
                <input type="text" id="id" name="id" value="<?= htmlspecialchars($utilisateur['id']) ?>" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($utilisateur['nom']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <select id="role" name="role" class="form-control" required>
                    <option value="admin" <?= $utilisateur['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="utilisateur" <?= $utilisateur['role'] === 'utilisateur' ? 'selected' : '' ?>>Utilisateur</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
