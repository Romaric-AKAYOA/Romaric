<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/emplois_du_temps.php');    

// Appeler la fonction pour lister les emplois du temps
$emplois_du_temps = lister_emplois_du_temps(); // Assurez-vous que cette fonction est définie dans emplois_du_temps.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Emplois du Temps</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Liste des Emplois du Temps</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Classe ID</th>
                <th>Cours ID</th>
                <th>Jour de la Semaine</th>
                <th>Heure de Début</th>
                <th>Heure de Fin</th>
                <th>Salle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($emplois_du_temps): // Vérifiez si $emplois_du_temps n'est pas vide ?>
                <?php foreach ($emplois_du_temps as $emploi): ?>
                <tr>
                    <td><?php echo htmlspecialchars($emploi['id']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['classe_id']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['cours_id']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['jour_semaine']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['heure_debut']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['heure_fin']); ?></td>
                    <td><?php echo htmlspecialchars($emploi['salle']); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $emploi['id']; ?>">Modifier</a>
                        <a href="supprimer.php?id=<?php echo $emploi['id']; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Aucun emploi du temps trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
