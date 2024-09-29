<?php
include('../../src/db.php');
include('../../src/cours.php');

$id = $_GET['id'];
supprimer_cours($id);
header('Location: lister.php');
exit();
?>
