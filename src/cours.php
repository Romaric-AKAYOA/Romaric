<?php
include('db.php');

function ajouter_cours($nom, $description, $enseignant_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO cours (nom, description, enseignant_id) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $description, $enseignant_id]);
}

function get_cours_by_id($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM cours WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_cours($id, $nom, $description, $enseignant_id) {
    global $conn;
    $stmt = $conn->prepare("UPDATE cours SET nom = ?, description = ?, enseignant_id = ? WHERE id = ?");
    $stmt->execute([$nom, $description, $enseignant_id, $id]);
}

function supprimer_cours($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM cours WHERE id = ?");
    $stmt->execute([$id]);
}

function lister_cours() {
    global $conn;
    $stmt = $conn->query("SELECT cours.*, enseignants.nom as nom_enseignant, enseignants.prenom as prenom_enseignant FROM cours
                          LEFT JOIN enseignants ON cours.enseignant_id = enseignants.id");
    return $stmt->fetchAll();
}
?>
