<?php
// paiements.php - Fonctions liées aux paiements des étudiants

// Ajouter un paiement
function ajouterPaiement($etudiant_id, $montant, $description, $statut) {
    global $conn;
    $sql = "INSERT INTO paiements (etudiant_id, montant, description, statut) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$etudiant_id, $montant, $description, $statut]);
}

// Modifier un paiement
function modifierPaiement($id, $montant, $description, $statut) {
    global $conn;
    $sql = "UPDATE paiements 
            SET montant = ?, description = ?, statut = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$montant, $description, $statut, $id]);
}

// Supprimer un paiement
function supprimerPaiement($id) {
    global $conn;
    $sql = "DELETE FROM paiements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

// Lister les paiements
function lister_paiements() {
    global $conn; // Utiliser la connexion globale
    try {
        // Requête SQL pour récupérer les paiements
        $sql = "SELECT * FROM paiements";
        $stmt = $conn->query($sql);
        $paiements = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $paiements;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des paiements : " . $e->getMessage();
        return [];
    }
}
?>
