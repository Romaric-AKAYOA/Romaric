<?php
include('db.php');

// Fonction pour ajouter un étudiant
function ajouter_etudiant($nom, $prenom, $date_naissance, $email) {
    global $db;  // Utiliser la connexion globale via $db

    try {
        $sql = "INSERT INTO etudiants (nom, prenom, date_naissance, email) VALUES (:nom, :prenom, :date_naissance, :email)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
    }
}
function get_etudiant_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM etudiants WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_etudiant($id, $nom, $prenom, $date_naissance, $email) {
    global $conn;
    $stmt = $conn->prepare("UPDATE etudiants SET nom = ?, prenom = ?, date_naissance = ?, email = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $date_naissance, $email, $id]);
}

function supprimer_etudiant($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM etudiants WHERE id = ?");
    $stmt->execute([$id]);
}

// etudiants.php
function lister_etudiants() {
    global $db;  // Utilisation de la connexion globale via $db

    try {
        $sql = "SELECT * FROM etudiants"; // Requête pour sélectionner tous les étudiants
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne tous les étudiants sous forme de tableau associatif
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des étudiants : " . $e->getMessage();
        return []; // Retourne un tableau vide en cas d'erreur
    }
}
?>
