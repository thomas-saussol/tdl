<?php

session_start();
require "config.php";

$id_tache=$_POST['id_tache'];

$statut="SELECT finie FROM todolist WHERE id='$id_tache'";
$result_statut=mysqli_query($base, $statut);
$etat_statut=mysqli_fetch_array($result_statut);

date_default_timezone_set('Europe/Paris');
$now = new DateTime();
$date=$now->format('Y-m-d H:i:s'); 


if($etat_statut['finie']==0)
{

	$tache_finie="UPDATE todolist SET finie = 1, `date_fin`='$date'  WHERE id='$id_tache'";
	mysqli_query($base, $tache_finie);
}
else
{
	$tache_finie="UPDATE todolist SET finie = 0, date_fin = NULL  WHERE id='$id_tache'";
	mysqli_query($base, $tache_finie);
}



?>