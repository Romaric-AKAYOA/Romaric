<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');    
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/classes.php');    


$id = $_GET['id'];
supprimer_classe($id);
header('Location: lister.php');
exit();
?>
