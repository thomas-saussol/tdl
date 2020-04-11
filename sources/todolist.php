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

<body class="accueil">

	<header>
		<div id="fond_couleur2">
			<div class="list">
				<h1>To do list</h1>
				<p id="slogan">Brique par brique vers l'avenir</p>
				<a href="../index.php">accueil</a>
			</div>
		</div>
	</header>

	<main>
		<div class="container">
			<div class="row">
				<div class="intro col-12">
					<h1>QUE DOIS-JE FAIRE ?</h1>
					<div>
						<div class="border1"></div>
					</div>
				</div>
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
</main>
<div class="bas_todolist">

</div>



	<script type="text/javascript" src="../js/todolist.js"></script>
</body>

</html>
