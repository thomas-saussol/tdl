$(document).ready(function(){
	 $("body").on("click","#sign_up",function(){

	 	
		var focus = this.getAttribute('class');
		if(focus == "inactive underlineHover")
		{
			$("#formulaire").remove()
			$("main").append('<div id="formulaire" class="wrapper fadeInDown"></div>')
			$("#formulaire").append('<div id="formContent"></div>')
			$("#formContent").append('<h2 id="sign_in" class="inactive underlineHover"> Connexion </h2>')
			$("#sign_in").after(' <h2 id="sign_up" class="active"> Inscription </h2>')
			$("#sign_up").after('<div  id="logo_site" class="fadeIn first"></div>')
			$("#logo_site").append('<img src="img/logo.png" id="icon" alt="User Icon"/>')
			$("#logo_site").after('<form></form>')
			$("form").append('<input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">')
			$("#login").after('<input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">')
			$("#password").after('<input type="text" id="password2" class="fadeIn third" name="login" placeholder="Confirm password">')
			$("#password2").after('<input type="button" class="fadeIn fourth" value="Créer un compte">')
		}
	});

	 $("body").on("click","#sign_in",function(){

	 	var focus = this.getAttribute('class');
		if(focus == "inactive underlineHover")
		{
			$("#formulaire").remove()
			$("main").append('<div id="formulaire" class="wrapper fadeInDown"></div>')
			$("#formulaire").append('<div id="formContent"></div>')
			$("#formContent").append('<h2 id="sign_in" class="active"> Connexion </h2>')
			$("#sign_in").after(' <h2 id="sign_up" class="inactive underlineHover">Inscription </h2>')
			$("#sign_up").after('<div  id="logo_site" class="fadeIn first"></div>')
			$("#logo_site").append('<img src="img/logo.png" id="icon" alt="User Icon"/>')
			$("#logo_site").after('<form></form>')
			$("form").append('<input type="text" id="login" class="fadeIn second" name="login" placeholder="Login">')
			$("#login").after('<input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">')
			$("#password").after('<input type="button" class="fadeIn fourth" value="Se connecter">')
		}
	});


});