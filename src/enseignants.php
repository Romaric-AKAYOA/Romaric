<?php
include('db.php');

function ajouter_enseignant($nom, $prenom, $email, $specialite) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO enseignants (nom, prenom, email, specialite) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $prenom, $email, $specialite]);
}

function get_enseignant_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM enseignants WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_enseignant($id, $nom, $prenom, $email, $specialite) {
    global $conn;
    $stmt = $conn->prepare("UPDATE enseignants SET nom = ?, prenom = ?, email = ?, specialite = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $email, $specialite, $id]);
}

function supprimer_enseignant($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM enseignants WHERE id = ?");
    $stmt->execute([$id]);
}

function lister_enseignants() {
    global $conn;
    $stmt = $conn->query("SELECT * FROM enseignants");
    return $stmt->fetchAll();
}
?>
