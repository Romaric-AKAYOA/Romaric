<?
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/absences.php');

// supprimer.php
$id = $_GET['id'];
supprimerAbsence($id);
header('Location: lister.php');
exit();
?>
