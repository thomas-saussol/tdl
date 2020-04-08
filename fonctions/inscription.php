<?php

session_start();
require "config.php";

$login_register=$_POST['login_register'];
$password_register=$_POST['password_register'];
$password2=$_POST['password2'];

$sql="SELECT *FROM utilisateurs WHERE login='$login_register'";
$req=mysqli_query($base,$sql);

if (mysqli_num_rows($req) > 0)
{
	echo "utilisateur existant";
}
else if(strlen($login_register) < 5)
{
	echo "Login trop court";
}
else if(strlen($password_register) < 8)
{
	echo "Mot de passe trop court";
}
else if($password_register != $password2)
{
	echo "Mots de passe différents";
}
else
{	
	$password_register=password_hash($password_register, PASSWORD_BCRYPT, ["cost" => 12]);
	$insert="INSERT INTO utilisateurs VALUES (NULL, '$login_register', '$password_register')";
	mysqli_query($base, $insert);
	echo "Inscrit";
}
?>
