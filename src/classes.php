<?php
include('db.php');

function ajouter_classe($nom, $annee_scolaire, $description) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO classes (nom, annee_scolaire, description) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $annee_scolaire, $description]);
}

function get_classe_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM classes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_classe($id, $nom, $annee_scolaire, $description) {
    global $conn;
    $stmt = $conn->prepare("UPDATE classes SET nom = ?, annee_scolaire = ?, description = ? WHERE id = ?");
    $stmt->execute([$nom, $annee_scolaire, $description, $id]);
}

function supprimer_classe($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
    $stmt->execute([$id]);
}

function lister_classes() {
    global $conn; // Utiliser la connexion globale
    try {
        // Requête SQL pour récupérer les classes
        $sql = "SELECT * FROM classes"; // Assurez-vous que la table s'appelle bien classes
        $stmt = $conn->query($sql);
        $classes = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer sous forme de tableau associatif
        return $classes;
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des classes : " . $e->getMessage();
        return [];
    }
}
?>
