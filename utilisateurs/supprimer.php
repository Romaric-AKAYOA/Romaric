<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/utilisateurs.php');


$id = $_GET['id'];
supprimer_utilisateurs($id);
header('Location: lister.php');
exit();
?>
