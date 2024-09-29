<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/inscriptions.php');


$id = $_GET['id'];
desinscrire_etudiant($id);
header('Location: lister.php');
exit();
?>
