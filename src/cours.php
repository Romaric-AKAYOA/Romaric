<?php
include('db.php');

function ajouter_cours($nom, $description, $enseignant_id, $coefficient) {
    global $db; // Utiliser la variable globale $db pour la connexion à la base de données
    try {
        $stmt = $db->prepare("INSERT INTO cours (nom, description, enseignant_id, coefficient) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $description, $enseignant_id, $coefficient]); // Ajout du coefficient
    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout du cours : " . $e->getMessage();
        exit();
    }
}


function get_cours_by_id($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM cours WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function modifier_cours($id, $nom, $description, $enseignant_id) {
    global $db;
    $stmt = $db->prepare("UPDATE cours SET nom = ?, description = ?, enseignant_id = ? WHERE id = ?");
    $stmt->execute([$nom, $description, $enseignant_id, $id]);
}

function supprimer_cours($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM cours WHERE id = ?");
    $stmt->execute([$id]);
}

function lister_cours() {
    global $db; // Utiliser la variable globale $db pour la connexion à la base de données

    // Requête SQL pour récupérer les cours, y compris le coefficient et les informations sur l'enseignant
    $stmt = $db->query("SELECT cours.*, enseignants.nom AS nom_enseignant, enseignants.prenom AS prenom_enseignant, cours.coefficient 
                        FROM cours
                        LEFT JOIN enseignants ON cours.enseignant_id = enseignants.id");
    
    // Renvoyer tous les résultats sous forme de tableau
    return $stmt->fetchAll();
}
?>


