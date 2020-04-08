function inscription_form(){

	$("#formulaire").remove()
	$("main").append('<div id="formulaire" class="wrapper fadeInDown"></div>')
	$("#formulaire").append('<div id="formContent"></div>')
	$("#formContent").append('<h2 id="sign_in" class="inactive underlineHover"> Connexion </h2>')
	$("#sign_in").after(' <h2 id="sign_up" class="active"> Inscription </h2>')
	$("#sign_up").after('<div  id="logo_site" class="fadeIn first"></div>')
	$("#logo_site").append('<img src="img/logo.png" id="icon" alt="User Icon"/>')
	$("#logo_site").after('<form></form>')
	$("form").append('<input type="text" id="login_register" class="fadeIn second" name="login_register" placeholder="Login">')
	$("#login_register").after('<input type="password" id="password_register" class="fadeIn third" name="password_register" placeholder="Password">')
	$("#password_register").after('<input type="password" id="password2" class="fadeIn third" name="password2" placeholder="Confirm password">')
	$("#password2").after('<input type="button" id="register" class="fadeIn fourth" value="Créer un compte">')
}


function connexion_form(){

	$("#formulaire").remove()
	$("main").append('<div id="formulaire" class="wrapper fadeInDown"></div>')
	$("#formulaire").append('<div id="formContent"></div>')
	$("#formContent").append('<p id="erreur_log" style="position: absolute;"></p>')
	$("#erreur_log").after('<h2 id="sign_in" class="active"> Connexion </h2>')
	$("#sign_in").after(' <h2 id="sign_up" class="inactive underlineHover">Inscription </h2>')
	$("#sign_up").after('<div  id="logo_site" class="fadeIn first"></div>')
	$("#logo_site").append('<img src="img/logo.png" id="icon" alt="User Icon"/>')
	$("#logo_site").after('<form></form>')
	$("form").append('<input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">')
	$("#login").after('<input type="password" id="password" class="fadeIn third" name="login" placeholder="Password">')
	$("#password").after('<input type="button" id="log_in" class="fadeIn fourth" value="Se connecter">')
}


function ajax(){

	$.ajax({
			type:"POST",
			url: url,
			data : data,


			success:function(data)
			{
				console.log(data)
				if(data == 1)
				{	
					$("#login_register").val("");
					$('#password_register').css({"border":"none"})
					$('#password2').css({"border":"none"})
					document.getElementById("login_register").placeholder = '*Un compte avec ce login existe déjà'
					$('#login_register').css({"border":"1px solid #C0392B"})
					document.getElementById("login_register").className="erreur"

						
				}
				else if(data == 2)
				{
					$("#login_register").val("");
					document.getElementById("login_register").placeholder = '*Login trop court'
					$('#login_register').css({"border":"1px solid #C0392B"})
					document.getElementById("login_register").className="erreur"
				}
				else if(data == 3)
				{
					$("#password_register").val("");
					$('#login_register').css({"border":"none"})
					document.getElementById("password_register").placeholder = '*Mot de passe trop court'
					$('#password_register').css({"border":"1px solid #C0392B"})
					document.getElementById("password_register").className="erreur"
				}
				else if(data == 4)
				{
					$("#password2").val("");
					$('#login_register').css({"border":"none"})
					document.getElementById("password2").placeholder = '*Les mots de passe ne correspondent pas'
					$('#password2').css({"border":"1px solid #C0392B"})
					document.getElementById("password2").className="erreur"
				}
				else if(data == 5)
				{
					$('#login_register').css({"border":"none"})
					$('#password_register').css({"border":"none"})
					$('#password2').css({"border":"none"})

					connexion_form()
				}
				else if( data == 6)	
				{
					$("#erreur_log").text("")
					$('#login').css({"border":"none"})
					$('#password').css({"border":"none"})
				}
				else if( data == 7)	
				{
					$("#login").val("")
					$("#password").val("")
					$("#erreur_log").text("*Login ou mot de passe incorrect")
					$('#login').css({"border":"1px solid #C0392B"})
					$('#password').css({"border":"1px solid #C0392B"})
					document.getElementById("login").className="erreur"
					document.getElementById("password").className="erreur"
				}
			}
		});
}

$(document).ready(function(){
	 $("body").on("click","#sign_up",function(){

	 	$('#erreur').text("")
		var focus = this.getAttribute('class');
		if(focus == "inactive underlineHover")
		{
			inscription_form()

		}
	});

	$("body").on("click","#sign_in",function(){

	 	$('#erreur').text("")
	 	var focus = this.getAttribute('class');
		if(focus == "inactive underlineHover")
		{
			connexion_form()
		}
	});

	 // INSCRIPTION

	 $("body").on("click","#register",function(){


		if($("#login_register").val() !="" && $("#password_register").val() !="" && $("#password2").val() !=""  )
		{
			login_register     = $("#login_register").val();
			password_register  = $("#password_register").val();
			password2          = $("#password2").val();
			
			url="fonctions/inscription.php"
			data={login_register: login_register, password_register: password_register, password2: password2}
			ajax()
		}
	});

	 $("body").on("click","#log_in",function(){


		if($("#login").val() !="" && $("#password").val() !="")
		{
			login    = $("#login").val();
			password = $("#password").val();
			
			url="fonctions/connexion.php"
			data={login: login, password: password}
			ajax()
		}
	});
});