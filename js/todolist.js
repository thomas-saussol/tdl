// SELECT DANS LA BDD DES TACHES 

data ={}
ajax()


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
			var incrementation_tache=0
			var incrementation_id=0

			var tableaux_date=[];
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
					    id=tableaux_id[incrementation_id]	
					    tache=tableaux_tache[incrementation_tache]
					    date=tableaux_date[incrementation_date]
					    statut=result[champ]
					    createListElement()	
					    incrementation_id++
					    incrementation_tache++
					    incrementation_date++
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
		        
	para.innerText = date;  
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
		
			tache = input.value
			data ={tache: tache}
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
		}
		else
		{
			$('#taches_en_cours').append($('#'+id))
		}

	});
});
