<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/cours.php');

$id = $_GET['id'];
supprimer_cours($id);
header('Location: lister.php');
exit();
?>
