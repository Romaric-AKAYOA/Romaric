<?php
// Inclure les fichiers nécessaires
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/enseignants.php');    


$id = $_GET['id'];
supprimer_enseignant($id);
header('Location: lister.php');
exit();
?>
