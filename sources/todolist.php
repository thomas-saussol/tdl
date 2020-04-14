<?php session_start();

if(!isset($_SESSION['login']))
{
	header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400&family=Roboto+Mono&display=swap">
		<link rel="stylesheet" href="style.css">
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>

		<title>To Do List</title>
	</head>

<body class="todolist">

<header>
	<div class="lien">
		<div><a href="../"><img width="50px" src="../img/home.png"></a></div>
		<div id="log_out"><img width="50px" src="../img/log_out.png"></div>
	</div>
	<div class="option">
		<div>
			<input type="text" placeholder="Login" name="user" id="user_name">
			<button id="ajout_user">Donner les droits d'ajout</button>
			<div id="result_add_user"></div>
		</div>
		<div class="option_acces">			
			<button id="delete">Supprimer les droits</button>
		</div>

	</div>
</header>
	

	<section>
		<div class="liste_taches_en_cours">
		<div class="container">
			<div class="row">
				<div class="intro col-12">
					<h1>QUE DOIS-JE FAIRE ?</h1>
					<div>
						<div class="border1"></div>
					</div>
				</div>
			</div>
			<div class="list_users">	
				<div class="row">
					<div class="helpText col-12">
						<p id="third">Utilisateur qui recevra la tache :</p>
					</div>
				</div>
				<select id="user_acces">
					<option id="user_log_on"><?php echo $_SESSION['login'];?></option>
				</select>
			</div>

			<div class="row">
				<div class="helpText col-12">

					<p id="third">Quand c'est fait clique dessus et hop c'est vert !</p>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<input type="text" id="userInput" placeholder="Nouvelle tâche.." maxlength="100">
					<button id="enter">
						<i class="fas fa-pencil-alt">
						</i>
					</button>
				</div>
			</div>

			<div class="row">
				<div id="affichage_li" class="listItems col-12">
					<ul id="taches_en_cours" class="col-12 offset-0 col-sm-8 offset-sm-2">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="liste_taches_finies">
		<div class="container2">
			<div class="row">
				<div class="intro col-12">
					<h1>Tâches finies</h1>
					<div>
						<div class="border1"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div id="affichage_tache_finie" class="listItems col-12">
					<ul id="les_taches_finies" class="col-12 offset-0 col-sm-8 offset-sm-2">
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
	<script type="text/javascript" src="../js/todolist.js"></script>
</body>

</html>