<?php
// absences.php - Fonctions liées aux absences

// Ajouter une absence
function ajouterAbsence($etudiant_id, $cours_id, $date_absence, $justification) {
    global $db; 
    $sql = "INSERT INTO absences (etudiant_id, cours_id, date_absence, justification) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification]);
}

// Modifier une absence
function modifierAbsence($id, $etudiant_id, $cours_id, $date_absence, $justification) {
    global $db; 
    $sql = "UPDATE absences SET etudiant_id = ?, cours_id = ?, date_absence = ?, justification = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification, $id]);
}

// Supprimer une absence
function supprimerAbsence($id) {
    global $db; 
    $stmt  = $db->prepare("DELETE FROM absences WHERE id = ?");
    $stmt->execute([$id]);
    
}

// Lister les absences
function lister_absences() {
    global $db; // Utiliser la connexion globale
    try {
        // Requête SQL pour récupérer les absences
        $sql = "SELECT * FROM absences";
        $stmt = $db->query($sql);
        $absences = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $absences;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des absences : " . $e->getMessage();
        return [];
    }
}
?>
