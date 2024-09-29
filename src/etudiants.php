<?php
include('db.php');

function ajouter_etudiant($nom, $prenom, $date_naissance, $email) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO etudiants (nom, prenom, date_naissance, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $date_naissance, $email]);
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
    global $conn;

    $sql = "SELECT * FROM etudiants"; // Remplacez par le nom de votre table
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne tous les étudiants sous forme de tableau
}

?>
