<?php
// db.php - Connexion à la base de données
$host = 'localhost';
$dbname = 'gestion_scolaire';
$username = 'root';
$password = '';

// Remplacez $conn par $db pour assurer la cohérence
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Connexion échouée : " . $e->getMessage(), 3, '/path/to/your/logfile.log');
    echo "Une erreur est survenue. Veuillez réessayer plus tard.";
}

