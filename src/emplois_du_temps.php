<?php
// emplois_du_temps.php - Fonctions liées aux emplois du temps

// Ajouter un emploi du temps
function ajouterEmploiDuTemps($classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin) {
    global $db; 
    $sql = "INSERT INTO emplois_du_temps (classe_id, cours_id, jour_semaine, heure_debut, heure_fin) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin, $salle]);
}

// Modifier un emploi du temps
function modifierEmploiDuTemps($id, $classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin) {
    global $db; 
    $sql = "UPDATE emplois_du_temps SET classe_id = ?, cours_id = ?, jour_semaine = ?, heure_debut = ?, heure_fin = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$classe_id, $cours_id, $jour_semaine, $heure_debut, $heure_fin, $id]);
}

// Supprimer un emploi du temps
function supprimerEmploiDuTemps($id) {
    global $db; 
    $sql = "DELETE FROM emplois_du_temps WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
}

// Lister les emplois du temps
function listerEmploisDuTemps() {
    global $db; 
    $sql = "SELECT * FROM emplois_du_temps";
    return $db->query($sql)->fetchAll();
}
function get_emploi_by_id($id) {
    global $db;  // Utiliser la connexion à la base de données

    // Préparer la requête SQL pour récupérer l'emploi du temps par ID
    $sql = "SELECT * FROM emplois_du_temps WHERE id = ?";
    
    // Préparer la déclaration
    $stmt = $db->prepare($sql);
    
    // Exécuter la requête avec l'ID passé en paramètre
    $stmt->execute([$id]);

    // Récupérer les résultats sous forme de tableau associatif
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function lister_emplois_du_temps() {
    global $db;  // Utilisez la connexion globale à la base de données
    try {
        // Requête SQL pour récupérer les emplois du temps
        $sql = "SELECT * FROM emplois_du_temps";
        $stmt = $db->query($sql);
        $emplois_du_temps = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer tous les résultats sous forme de tableau associatif
        return $emplois_du_temps; // Retourner les emplois du temps
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur lors de la récupération des emplois du temps : " . $e->getMessage();
        return [];
    }
}
?>
