<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/paiements.php');

// ajouter.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiant_id = $_POST['etudiant_id'];
    $montant = $_POST['montant'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];

    // Code pour ajouter à la base de données
    ajouterPaiement($etudiant_id, $montant, $description, $statut);
    header('Location: lister.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Paiement</title>
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
    <div class="container">
        <h1 class="mb-4">Ajouter Paiement</h1>
        <form method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="etudiant_id">Étudiant ID</label>
                <input type="text" name="etudiant_id" class="form-control" required>
                <div class="invalid-feedback">Veuillez entrer l'ID de l'étudiant.</div>
            </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" name="montant" class="form-control" required>
                <div class="invalid-feedback">Veuillez entrer le montant.</div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut" class="form-control">
                    <option value="Payé">Payé</option>
                    <option value="Impayé">Impayé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Validation du formulaire Bootstrap
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
