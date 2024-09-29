<?php
// utilisateurs.php - Gestion des utilisateurs

// Connexion à la base de données
require_once 'db.php'; // Charge la connexion PDO

// Démarrer la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fonction pour inscrire un nouvel utilisateur
function inscrireUtilisateur($nom, $email, $mot_de_passe) {
    global $conn;

    // Hachage du mot de passe
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nom, $email, $mot_de_passe_hash]);
}

// Fonction pour se connecter
function login($email, $password) {
    // Utilisateur codé en dur pour les tests
    $utilisateur_test = [
        'email' => 'test@example.com',
        'password' => 'test1234'
    ];

    // Vérification avec l'utilisateur codé en dur
    if ($email === $utilisateur_test['email'] && $password === $utilisateur_test['password']) {
        $_SESSION['utilisateur_id'] = 1; // Simule l'ID de l'utilisateur
        return true;
    }

    // Vérification avec la base de données
    global $conn;

    try {
        $stmt = $conn->prepare('SELECT * FROM utilisateurs WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch();

        // Vérification du mot de passe
        if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {
            $_SESSION['utilisateur_id'] = $utilisateur['id']; // Assurez-vous que cette colonne existe
            return true;
        }
    } catch (PDOException $e) {
        die("Erreur lors de la connexion : " . $e->getMessage());
    }

    return false;
}

// Fonction pour vérifier si l'utilisateur est connecté
function isLoggedIn() {
    return isset($_SESSION['utilisateur_id']);
}

// Déconnexion
function logout() {
    session_destroy();
}

// Fonction pour obtenir les informations de l'utilisateur connecté
function obtenirUtilisateurConnecte() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['utilisateur_id'],
            'nom' => $_SESSION['nom']
        ];
    }
    return null; // Aucun utilisateur connecté
}
?>
