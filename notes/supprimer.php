<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Gest_scolaire_2/src/notes.php');


$id = $_GET['id'];
supprimer_note($id);
header('Location: lister.php');
exit();
?>
