// SELECT DANS LA BDD DES TACHES 


data ={}
ajax()

// ACCES UTILISATEUR LISTE DEROULANTE

ajax_user_acces()
ajax_list_of_users_acces()

function ajax_log_out(){

	$.ajax({
			type:"POST",
			url: url,
			data : data,

		success:function(data){	
			window.location.reload();
		}
	});
}

function ajax_list_of_users_acces(){
$.ajax({
			
		type:"POST",
		url: "../fonctions/list_users_acces.php",

		success:function(data){	

			$("#list").remove()
			var nbr_users_acces=0
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_users_acces++;
				}
			}
			for(i=0; i < nbr_users_acces; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++  )
				{
				   	var champ = Object.keys(result)[j];
				  	$("#user_acces_delete").append("<option id='list'>"+result[champ]+"</option>")
				}
	   		}  		
		}
	});
}

function ajax_user_acces(){
$.ajax({
			
		type:"POST",
		url: "../fonctions/users_acces.php",
		data: data,

		success:function(data){
			var nbr_users=0
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_users++;
				}
			}
			for(i=0; i < nbr_users; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++  )
				{
				   	var champ = Object.keys(result)[j];
				  	$("#user_acces").append("<option>"+result[champ]+"</option>")
				}
	   		}  
		}
	});
}

function ajax_add_users_acces(){
$.ajax({
			
		type:"POST",
		url: "../fonctions/add_users_acces.php",
		data: data,

		success:function(data){	
		
			if(data != "")
			{		
				$("#result_access").remove();
				$("#result_add_user").append("<p id='result_access'>"+data+"</p>");	
				setTimeout(function() {
				  document.getElementById('result_access').innerHTML = "";
				},3000);
			}
				ajax_list_of_users_acces()	
		}
	});
}



function ajax_tache_finie(){
$.ajax({
			
		type:"POST",
		url: "../fonctions/tache_finie.php",
		data: data,

		success:function(data){
		}
	});
}



function ajax_delete_element(){
	$.ajax({
			
		type:"POST",
		url: "../fonctions/delete_tache.php",
		data: data,

		success:function(data){
		}
	});
}

// INSERT DANS LA BDD LES TACHES

function ajax(){

	$.ajax({
			
		type:"POST",
		url: "../fonctions/insert_bdd.php",
		data : data,
		 
		success:function(data)
		{	
			$(".affichage_taches").remove()
			var nbr=0;
			var tableaux_id=[]
			var tableaux_tache=[]
			var tableaux_statut=[]
			var tableaux_date=[];

			var incrementation_tache=0
			var incrementation_id=0
			var incrementation_statut=0
			var incrementation_date=0;

			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr++;
				}
			}	
			for(i=0; i < nbr; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++  )
				{
				   	var champ = Object.keys(result)[j];
				    if(j==0)
				    {
				    	id=result[champ]
				    	tableaux_id.push(id)
				    }
					if(j==2)
					{	
					    tache=result[champ]
				    	tableaux_tache.push(tache)
					}
					if(j==3)
					{
					    date=result[champ].substr(0,16)
				    	tableaux_date.push(date)
					}
					if(j==4)
					{			  
					    statut=result[champ]
					    tableaux_statut.push(statut)
					}
					if(j==5)
					{
					    id=tableaux_id[incrementation_id]	
					    tache=tableaux_tache[incrementation_tache]
					    date=tableaux_date[incrementation_date]
					    date_fin=result[champ]
					    createListElement()	
					    incrementation_id++
					    incrementation_tache++
					    incrementation_date++
					    incrementation_statut++
					}
				}
	   		}   		 	
		}
	});
}


var enterButton = document.getElementById("enter");
var input = document.getElementById("userInput");
var ul = document.querySelector("ul");
var item = document.getElementsByTagName("li");



function inputLength() {
	return input.value.length;
}


// CREATION ELEMENT

function createListElement() {

		
	var para = document.createElement("P"); 
	var para2 = document.createElement("P");         
	var li = document.createElement("li");
	li.className = 'affichage_taches';
	li.id=id


	para.innerText = "Début : "+date;  
	para2.innerText = tache;  
	li.appendChild(para);
	li.appendChild(para2);
	
	ul.appendChild(li);
	input.value = "";

	function crossOut(){

		var id_tache = li.id;
		data={id_tache: id_tache}
		ajax_tache_finie()
		li.classList.toggle("done");
	}

	li.addEventListener("click", crossOut);
	var dBtn = document.createElement("button");
	dBtn.appendChild(document.createTextNode("\ud83d\uddd1"));
	li.appendChild(dBtn);
	dBtn.addEventListener("click", deleteListItem);

	function deleteListItem() {
		
		var id_tache = li.id;
		data={id_tache: id_tache}
		ajax_delete_element()
		li.classList.add("delete");
	}

	if(statut==1){

		li.classList.toggle("done");
		$('#les_taches_finies').append($('#'+id))				
		var para3 = document.createElement("P"); 
		para3.innerText = "Fin : "+date_fin.substr(0,16); 
		li.appendChild(para3);
		para2.before(para3)
		para3.id=id+"date_fin"
	}
}

function addListAfterClick() {

	if (inputLength() > 0) {
		createListElement();
	}
}

function addListAfterKeypress(event) {
	if (inputLength() > 0 && event.which === 13) {
		createListElement();
	}
}

$(document).ready(function(){
	$("#enter").click(function(){
		if($("#userInput").val() != "")
		{
			$("#result_access").remove();
			var user_tache=document.getElementById('user_acces').value
			tache = input.value
			data ={tache: tache, user_tache: user_tache}
			ajax()
		}
	});

	// DEPLACER LA TACHE DANS LES TACHES FINIES

	$("body").on("click","li",function(){
		
		id=this.id
		id_parent=$("#"+id).parent().attr('id')

		if(id_parent == "taches_en_cours")
		{
			$('#les_taches_finies').append($('#'+id))
			ajax()
		}
		else
		{
			$('#taches_en_cours').append($('#'+id))
			$("#"+id+"date_fin").remove()
			ajax()
		}
	});
	$("body").on("click","#ajout_user",function(){

		var user=$("#user_name").val()
		if(user != "")
		{
			data={user: user}
			ajax_add_users_acces()
			$("#user_name").val("")
		}
	});

	$("body").on("click","#delete",function(){

		$("#result_access").remove();
		var user_acces_delete=document.getElementById('user_acces_delete').value
		data={user_acces_delete: user_acces_delete}
		ajax_add_users_acces()
	});

	$("body").on("click","#log_out",function(){

		url="../fonctions/deconnexion.php"
		data={}
		ajax_log_out()
	});
});
