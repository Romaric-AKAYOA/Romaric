<?php

include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');


function ajouter_classe($nom, $annee_scolaire, $description) {
    global $db;  // Assurez-vous d'utiliser la connexion globale $db

    try {
        $sql = "INSERT INTO classes (nom, annee_scolaire, description) VALUES (:nom, :annee_scolaire, :description)";
        $stmt = $db->prepare($sql);  // Utilisez $db, et non $conn
        
        // Liez les paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':annee_scolaire', $annee_scolaire);
        $stmt->bindParam(':description', $description);

        // Exécutez la requête
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de la classe : " . $e->getMessage();
        return false;
    }
}

function get_classe_by_id($id) {
    global $db; 
    $stmt = $db->prepare("SELECT * FROM classes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_classe($id, $nom, $annee_scolaire, $description) {
    global $db; 
    $stmt = $db->prepare("UPDATE classes SET nom = ?, annee_scolaire = ?, description = ? WHERE id = ?");
    $stmt->execute([$nom, $annee_scolaire, $description, $id]);
}

function supprimer_classe($id) {
    global $db; 
    $stmt = $db->prepare("DELETE FROM classes WHERE id = ?");
    $stmt->execute([$id]);
}

function lister_classes() { 
    global $db; // Utiliser la connexion globale correcte ($db)

    try {
        // Requête SQL pour récupérer les classes
        $sql = "SELECT * FROM classes"; // Assurez-vous que la table s'appelle bien "classes"
        $stmt = $db->query($sql);  // Utilisez $db, et non $conn
        
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $classes;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des classes : " . $e->getMessage();
        return [];
    }
}

?>
