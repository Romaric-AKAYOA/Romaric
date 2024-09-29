<?php
include('../../src/db.php');
include('../../src/enseignants.php');

$id = $_GET['id'];
supprimer_enseignant($id);
header('Location: lister.php');
exit();
?>
