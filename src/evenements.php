<?php
// evenements.php - Fonctions liées aux événements scolaires

// Ajouter un événement
function ajouterEvenement($titre, $description, $date_evenement, $lieu) {
    global $conn;
    $sql = "INSERT INTO evenements (titre, description, date_evenement, lieu) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $description, $date_evenement, $lieu]);
}

// Modifier un événement
function modifierEvenement($id, $titre, $description, $date_evenement, $lieu) {
    global $conn;
    $sql = "UPDATE evenements 
            SET titre = ?, description = ?, date_evenement = ?, lieu = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$titre, $description, $date_evenement, $lieu, $id]);
}

// Supprimer un événement
function supprimerEvenement($id) {
    global $conn;
    $sql = "DELETE FROM evenements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

// Lister les événements
function lister_evenements() {
    global $conn; // Utiliser la connexion globale
    try {
        // Requête SQL pour récupérer les événements
        $sql = "SELECT * FROM evenements";
        $stmt = $conn->query($sql);
        $evenements = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $evenements;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des événements : " . $e->getMessage();
        return [];
    }
}
?>
