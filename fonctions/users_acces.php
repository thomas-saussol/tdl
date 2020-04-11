<?php

session_start();
require "config.php";



$user=$_SESSION['login'];

$req_user="SELECT id FROM utilisateurs WHERE login='$user'";
$result_user=mysqli_query($base, $req_user);
$id_user=mysqli_fetch_array($result_user);
$id=$id_user['id'];

$req_user_acces="SELECT login FROM utilisateurs, acces WHERE id_utilisateur_acces=utilisateurs.id and id_utilisateur='$id'";

$result_users_acces=mysqli_query($base, $req_user_acces);
$ifexist_users=mysqli_num_rows($result_users_acces);

if($ifexist_users != 0)
{
	while($row = mysqli_fetch_assoc($result_users_acces)){
	    $json[] = $row;
	}
	echo json_encode($json);
}
?>