<?php


session_start();
require "config.php";


$user=$_SESSION['login'];

$req_user="SELECT id FROM utilisateurs WHERE login='$user'";
$result_user=mysqli_query($base, $req_user);
$id_user=mysqli_fetch_array($result_user);
$id=$id_user['id'];

$list_user_acces="SELECT login FROM utilisateurs, acces WHERE id_utilisateur=utilisateurs.id and id_utilisateur_acces='$id'";


$result_list_users=mysqli_query($base, $list_user_acces);
$ifexist=mysqli_num_rows($result_list_users);

if($ifexist != 0)
{
	while($row = mysqli_fetch_assoc($result_list_users)){
	    $json[] = $row;
	}
	echo json_encode($json);
}


?>