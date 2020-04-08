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
	echo "1";
}
else if(strlen($login_register) < 5)
{
	echo "2";
}
else if(strlen($password_register) < 8)
{
	echo "3";
}
else if($password_register != $password2)
{
	echo "4";
}
else
{	
	$password_register=password_hash($password_register, PASSWORD_BCRYPT, ["cost" => 12]);
	$insert="INSERT INTO utilisateurs VALUES (NULL, '$login_register', '$password_register')";
	mysqli_query($base, $insert);
	echo "5";
}

?>
