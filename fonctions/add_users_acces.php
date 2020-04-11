<?php

session_start();
require "config.php";


// SELECT MON ID

$user=$_SESSION['login'];
$req_user="SELECT id FROM utilisateurs WHERE login='$user'";
$result_user=mysqli_query($base, $req_user);
$id_user=mysqli_fetch_array($result_user);
$id=$id_user['id'];




// SI JE VEUX AJOUTER UN ACCES

if(!isset($_POST['user_acces_delete']))
{

// SELECT ID DE L UTILISATEUR AJOUTE

$login=$_POST['user'];
$req_add_user="SELECT id FROM utilisateurs WHERE login='$login'";
$query_add_user=mysqli_query($base, $req_add_user);
$result_query=mysqli_num_rows($query_add_user);

$id_add_user=mysqli_fetch_array($query_add_user);
$id_user_acces=$id_add_user['id'];

// REGARDE SI L UTILISATEUR NA PAS DEJA LES DROITS

$already_acces="SELECT *FROM acces WHERE id_utilisateur='$id_user_acces' and id_utilisateur_acces='$id'";
$req_if_exist=mysqli_query($base, $already_acces);
$test_if_exist=mysqli_num_rows($req_if_exist);

if($result_query == 0)
{
	echo "Cet utilisateur n'existe pas";
}
else if($login == $user)
{
	echo "Vous ne pouvez pas vous donner vos propres droits";
}
else if($test_if_exist > 0)
{
	echo "Cet utilisateur à déjà les droits";
}
else
{
	$add_new_user_acces="INSERT into acces VALUES(NULL, '$id_user_acces', '$id')";
	mysqli_query($base, $add_new_user_acces);
	echo "Vous avez donné les droits à " .$login. " !";
}
}
else
{
	$login=$_POST['user_acces_delete'];
	$req_add_user="SELECT id FROM utilisateurs WHERE login='$login'";
	$query_add_user=mysqli_query($base, $req_add_user);
	$id_add_user=mysqli_fetch_array($query_add_user);
	$id_user_acces=$id_add_user['id'];

	$delete_acces="DELETE FROM acces WHERE id_utilisateur = '$id_user_acces' and id_utilisateur_acces='$id'";
	mysqli_query($base, $delete_acces);
}
?>