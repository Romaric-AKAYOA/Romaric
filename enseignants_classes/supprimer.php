<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants_classes.php');  // Mise à jour ici

// supprimer.php
$id = $_GET['id'];
supprimerEnseignantClasse($id) 
header('Location: lister.php');
exit();
?>
