<?php

session_start();
require "config.php";

$id_tache=$_POST['id_tache'];

$delete_tache="DELETE FROM todolist WHERE id='$id_tache'";
mysqli_query($base, $delete_tache);

echo $_POST['done'];

?>