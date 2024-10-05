<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/paiements.php');

$id = $_GET['id'];
supprimerPaiement($id) ;
header('Location: lister.php');
exit();
?>
