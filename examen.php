<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
