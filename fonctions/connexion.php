<?php


session_start();
require "config.php";


$login=$_POST['login'];
$password=$_POST['password'];


$req_user="SELECT *FROM utilisateurs WHERE login='$login'";
$result_req_user=mysqli_query($base, $req_user);
$array_from_result=mysqli_fetch_array($result_req_user);

	if(password_verify($password, $array_from_result['password'])) 
	{
		$_SESSION['login']=$login;
		$_SESSION['password']=$password;
		echo "Connecté";
	}
	else
	{
		echo "Login ou mot de passe incorrect";
	}
?>