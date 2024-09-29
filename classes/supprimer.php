<?php
include('../../src/db.php');
include('../../src/classes.php');

$id = $_GET['id'];
supprimer_classe($id);
header('Location: lister.php');
exit();
?>
