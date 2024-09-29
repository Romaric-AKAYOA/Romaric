<?php
include('db.php');

function inscrire_etudiant($etudiant_id, $cours_id) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO inscriptions (etudiant_id, cours_id) VALUES (?, ?)");
    $stmt->execute([$etudiant_id, $cours_id]);
}

function desinscrire_etudiant($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM inscriptions WHERE id = ?");
    $stmt->execute([$id]);
}

// Dans votre fichier inscriptions.php
function lister_inscriptions() {
    global $conn; // Utilise la connexion à la base de données
    $stmt = $conn->query("
        SELECT inscriptions.id, 
               etudiants.nom AS etudiant_nom, 
               etudiants.prenom AS etudiant_prenom, 
               cours.nom AS cours_nom, 
               inscriptions.date_inscription 
        FROM inscriptions 
        JOIN etudiants ON inscriptions.etudiant_id = etudiants.id 
        JOIN cours ON inscriptions.cours_id = cours.id
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourne les résultats sous forme de tableau
}

function inscrireUtilisateur($nom, $email, $mot_de_passe) {
    global $conn;

    // Hachage du mot de passe
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $email, $mot_de_passe_hash]);
}


function connecterUtilisateur($email, $mot_de_passe) {
    global $conn;

    $sql = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch();

    // Vérification du mot de passe
    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
        // Initialiser la session
        session_start();
        $_SESSION['utilisateur_id'] = $utilisateur['id'];
        $_SESSION['nom'] = $utilisateur['nom'];
        return true; // Connexion réussie
    }
    return false; // Échec de la connexion
}

?>

