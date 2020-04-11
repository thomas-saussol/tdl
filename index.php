<html>
	<head>
		<title>Accueil</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.7">
		<link href="sources/style.css" rel="stylesheet">
		<!-- JQUERY -->
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<!-- MON SCRIPT -->
		<script type="text/javascript" src="js/script.js"></script>
	</head>
<body class="accueil">


<?php session_start();

if(!isset($_SESSION['login']))
{
?>

<header>
	<div id="fond_couleur">
		<div class="list">
			<h1>To do list</h1>
			<p id="slogan">Brique par brique vers l'avenir</p>
		</div>
	</div>
</header>


<main>
	<div id="formulaire" class="wrapper fadeInDown">
  		<div id="formContent">
		    <!-- Tabs Titles -->
		    <p id="erreur_log"></p>
			<h2 id="sign_in" class="active"> Connexion </h2>
		    <h2 id="sign_up" class="inactive underlineHover">Inscription </h2>
		    <!-- Icon -->
		    <div id="logo_site" class="fadeIn first">
		      <img src="img/logo.png" id="icon" alt="User Icon"  />
		    </div>
		    <!-- Login Form -->
		    <form>
		      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
		      <input type="password" id="password" class="fadeIn third" name="login" placeholder="password">
		      <input type="button" id="log_in" class="fadeIn fourth" value="Se connecter">
		    </form>
  		</div>
	</div>
</main>

<?php
}
else
{
?>
<header>
	<div id="fond_couleur">
		<div class="list">
			<h1>To do list</h1>
			<p id="slogan">Brique par brique vers l'avenir</p>
			<ul>
				<li><a href="sources/todolist.php">Ma To Do List</a></li>
				<li id="profil">Mon profil</li>
				<li id="log_out">Déconnexion</li>
			</ul>
		</div>
	</div>
</header>

<main>

</main>

<?php
}
?>

<footer>
	<div id="fond_couleur">
		<div class="logo_footer">
			<img src="img/logo.png" width="70px">
			<p>To Do List © Adrien Gonzalez & Thomas Saussol</p>
			<p></p>
		</div>
	</div>
</footer>


</body>
</html>
