<?php
// enseignants_classes.php - Gestion des relations enseignants-classes

// Assigner un enseignant à une classe
function assignerEnseignantClasse($enseignant_id, $classe_id) {
    global $db; 
    $sql = "INSERT INTO enseignants_classes (enseignant_id, classe_id) 
            VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$enseignant_id, $classe_id]);
}

// Modifier une relation enseignant-classe
function modifierEnseignantClasse($id, $enseignant_id, $classe_id) {
    global $conn;
    $sql = "UPDATE enseignants_classes 
            SET enseignant_id = ?, classe_id = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$enseignant_id, $classe_id, $id]);
}

// Supprimer une relation enseignant-classe
function supprimerEnseignantClasse($id) {
    global $db; 
    $sql = "DELETE FROM enseignants_classes WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
}

// Lister les relations enseignants-classes
function listerEnseignantsClasses() {
    global $db; 
    $sql = "SELECT * FROM enseignants_classes";
    return $db->query($sql)->fetchAll();
}
// Fonction pour lister les relations enseignants-classes
function lister_relations() {
    global $db;  // Assurez-vous que $conn est accessible ici

    // Requête SQL
    $sql = "SELECT ec.id, e.nom AS enseignant_nom, c.nom AS classe_nom 
            FROM enseignants_classes ec 
            JOIN enseignants e ON ec.enseignant_id = e.id 
            JOIN classes c ON ec.classe_id = c.id";

    // Exécution de la requête
    $stmt = $db->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner les résultats
}
?>
