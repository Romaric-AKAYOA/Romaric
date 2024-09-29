<?php
include('../../src/db.php');
include('../../src/inscriptions.php');

$id = $_GET['id'];
desinscrire_etudiant($id);
header('Location: lister.php');
exit();
?>
