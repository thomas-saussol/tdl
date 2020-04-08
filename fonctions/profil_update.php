<?php

session_start();
require "config.php";

$login=$_POST['login_profil'];
$password=$_POST['password_profil'];

$last_login=$_SESSION['login'];
$last_password=$_SESSION['password'];

if($login != $last_login && $password != $last_password)
{
	$req_exist_user="SELECT *FROM utilisateurs WHERE login='$login'";
	$result_exist_user=mysqli_query($base, $req_exist_user);
	$num_of_result=mysqli_num_rows($result_exist_user);

	if($num_of_result > 0 )
	{
		echo "Login déjà existant";
	}
	else if(strlen($password) < 8)
	{
		echo "Veuillez rentrer un mot de passe plus long";
	}
	else
	{
		$password_hash=password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
		$update_login_user="UPDATE utilisateurs SET login = '$login' , password= '$password_hash' WHERE login ='$last_login'";
		mysqli_query($base, $update_login_user);
		$_SESSION['login']=$login;
		$_SESSION['password']=$password;
		echo "Modification réussie";
	}

}
else if($login != $last_login)
{
	$req_exist_user="SELECT *FROM utilisateurs WHERE login='$login'";
	$result_exist_user=mysqli_query($base, $req_exist_user);
	$num_of_result=mysqli_num_rows($result_exist_user);

	if($num_of_result > 0)
	{
		echo "Login déjà existant";
	}
	else
	{	
		$update_login_user="UPDATE utilisateurs SET login = '$login' WHERE login ='$last_login'";
		mysqli_query($base, $update_login_user);
		$_SESSION['login']=$login;
		echo "Modification réussie";
	}
}
else if($password != $last_password)
{
	if(strlen($password) < 8)
	{
		echo "Veuillez rentrer un mot de passe plus long";
	}
	else
	{
		$password_hash=password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
		$update_login_password="UPDATE utilisateurs SET password = '$password_hash' WHERE login ='$last_login'";
		mysqli_query($base, $update_login_password);
		$_SESSION['password']=$password;
		echo "Modification réussie";
	}
}
else
{
	echo "Aucun changement";
}

?>