<?php
include('db.php');

// Fonction pour ajouter un enseignant
function ajouter_enseignant($nom, $prenom, $email, $telephone, $adresse) {
    global $db;  // Utiliser la connexion globale via $db

    try {
        $sql = "INSERT INTO enseignants (nom, prenom, email, telephone, adresse) VALUES (:nom, :prenom, :email, :telephone, :adresse)";
        $stmt = $db->prepare($sql);
        
        // Lier les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':adresse', $adresse);
        
        // Exécuter la requête
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'enseignant : " . $e->getMessage();
    }
}

function get_enseignant_by_id($id) {
    global $db; 
    $stmt = $db->prepare("SELECT * FROM enseignants WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_enseignant($id, $nom, $prenom, $email, $specialite) {
    global $db; 
    $stmt = $db->prepare("UPDATE enseignants SET nom = ?, prenom = ?, email = ?, specialite = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $email, $specialite, $id]);
}

function supprimer_enseignant($id) {
    global $db; 
    $stmt = $db->prepare("DELETE FROM enseignants WHERE id = ?");
    $stmt->execute([$id]);
}

// Fonction pour lister les enseignants
function lister_enseignants() {
    global $db;  // Utiliser la connexion globale via $db
    
    try {
        $sql = "SELECT * FROM enseignants"; // Requête pour sélectionner tous les enseignants
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne tous les enseignants sous forme de tableau associatif
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des enseignants : " . $e->getMessage();
        return []; // Retourne un tableau vide en cas d'erreur
    }
}

?>
