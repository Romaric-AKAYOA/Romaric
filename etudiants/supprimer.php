<?php
include('../../src/db.php');
include('../../src/etudiants.php');

$id = $_GET['id'];
supprimer_etudiant($id);
header('Location: lister.php');
exit();
?>
