<?php


session_start();
require "config.php";

$login=$_SESSION['login'];
$password=$_SESSION['password'];

$tab=[$login, $password];


for($i=0; $i<sizeof($tab); $i++) {	
	    	$json[] = $tab[$i];
		}
	 echo json_encode($json);
?>