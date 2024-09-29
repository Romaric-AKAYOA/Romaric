<?php
// absences.php - Fonctions liées aux absences

// Ajouter une absence
function ajouterAbsence($etudiant_id, $cours_id, $date_absence, $justification) {
    global $conn;
    $sql = "INSERT INTO absences (etudiant_id, cours_id, date_absence, justification) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification]);
}

// Modifier une absence
function modifierAbsence($id, $etudiant_id, $cours_id, $date_absence, $justification) {
    global $conn;
    $sql = "UPDATE absences SET etudiant_id = ?, cours_id = ?, date_absence = ?, justification = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$etudiant_id, $cours_id, $date_absence, $justification, $id]);
}

// Supprimer une absence
function supprimerAbsence($id) {
    global $conn;
    $sql = "DELETE FROM absences WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

// Lister les absences
function lister_absences() {
    global $conn; // Utiliser la connexion globale
    try {
        // Requête SQL pour récupérer les absences
        $sql = "SELECT * FROM absences";
        $stmt = $conn->query($sql);
        $absences = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $absences;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des absences : " . $e->getMessage();
        return [];
    }
}
?>
