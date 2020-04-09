<?php

session_start();
require "config.php";

$id_tache=$_POST['id_tache'];

$statut="SELECT finie FROM todolist WHERE id='$id_tache'";
$result_statut=mysqli_query($base, $statut);
$etat_statut=mysqli_fetch_array($result_statut);


if($etat_statut['finie']==0)
{
	$tache_finie="UPDATE todolist SET finie = 1 WHERE id='$id_tache'";
	mysqli_query($base, $tache_finie);
}
else
{
	$tache_finie="UPDATE todolist SET finie = 0 WHERE id='$id_tache'";
	mysqli_query($base, $tache_finie);
}



?>