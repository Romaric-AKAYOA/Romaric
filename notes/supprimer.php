<?php
include('../../src/db.php');
include('../../src/notes.php');

$id = $_GET['id'];
supprimer_note($id);
header('Location: lister.php');
exit();
?>
