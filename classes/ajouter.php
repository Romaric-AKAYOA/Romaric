<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier que les données sont bien reçues
    var_dump($_POST);

    $nom = $_POST['nom'];
    $annee_scolaire = $_POST['annee_scolaire'];
    $description = $_POST['description'];

    if (ajouter_classe($nom, $annee_scolaire, $description)) {
        header('Location: lister.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de la classe.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Classe</title>
    
    <!-- Lien vers le CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles supplémentaires pour une personnalisation -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>Ajouter une Classe</h2>
            
            <!-- Formulaire responsive avec Bootstrap -->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nom">Nom de la classe</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom de la classe" required>
                </div>

                <div class="form-group">
                    <label for="annee_scolaire">Année Scolaire</label>
                    <input type="text" class="form-control" id="annee_scolaire" name="annee_scolaire" placeholder="Entrez l'année scolaire (ex: 2023-2024)" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez une description (facultatif)"></textarea>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Lien vers le JS de Bootstrap et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
