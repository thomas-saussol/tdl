<?php

session_start();
require "config.php";


$user=$_SESSION['login'];

$req_user="SELECT id FROM utilisateurs WHERE login='$user'";
$result_user=mysqli_query($base, $req_user);
$id_user=mysqli_fetch_array($result_user);
$id=$id_user['id'];

if(isset($_POST['finie']))
{
	echo "1";
}

if(isset($_POST['tache']))
{
	// DATE
	date_default_timezone_set('Europe/Paris');
	$now = new DateTime();
	$date=$now->format('Y-m-d H:i:s'); 

	// NOM DE LA TACHE
	$tache=$_POST['tache'];

	$insert_tache="INSERT INTO todolist (id_utilisateur, tache, `date`) VALUES ('$id', '$tache','$date')";
	mysqli_query($base,$insert_tache);
}


$select_bdd="SELECT *FROM todolist WHERE id_utilisateur='$id' ORDER by id ASC";
$result_select_bdd=mysqli_query($base, $select_bdd);
$ifexist=mysqli_num_rows($result_select_bdd);

if($ifexist != 0)
{
	while($row = mysqli_fetch_assoc($result_select_bdd)){
	    $json[] = $row;
	}
	echo json_encode($json);
}


?>