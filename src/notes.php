<?php
include('db.php');

function ajouter_note($etudiant_id, $cours_id, $note) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO notes (etudiant_id, cours_id, note) VALUES (?, ?, ?)");
    $stmt->execute([$etudiant_id, $cours_id, $note]);
}

function modifier_note($id, $etudiant_id, $cours_id, $note) {
    global $conn;
    $stmt = $conn->prepare("UPDATE notes SET etudiant_id = ?, cours_id = ?, note = ? WHERE id = ?");
    $stmt->execute([$etudiant_id, $cours_id, $note, $id]);
}

function supprimer_note($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);
}

// Dans votre fichier notes.php
function lister_notes() {
    global $conn; // Utilise la connexion à la base de données
    $stmt = $conn->query("
        SELECT notes.id, 
               etudiants.nom AS etudiant_nom, 
               etudiants.prenom AS etudiant_prenom, 
               cours.nom AS cours_nom, 
               notes.note, 
               notes.date_enregistrement 
        FROM notes 
        JOIN etudiants ON notes.etudiant_id = etudiants.id 
        JOIN cours ON notes.cours_id = cours.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne les résultats sous forme de tableau
}


function recuperer_note($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM notes WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}
?>

