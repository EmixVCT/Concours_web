window.onload = initPage;


function initPage(){
	xhrRessource = new XMLHttpRequest();
	xhrRessource.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ressources").innerHTML = this.responseText;
		}
	};
	
	xhrSearcher = new XMLHttpRequest();
	xhrSearcher.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("searchers").innerHTML = this.responseText;
		}
	};
	
	var searchInput = document.getElementById("input_chercheur");
	addListenerMulti(searchInput, "change keydown paste input",function (event) {show_searcher();} );
	
	var searchInput = document.getElementById("input_ressource");
	addListenerMulti(searchInput, "change keydown paste input",function (event) {show_ressource();} );
	
	show_ressource();
	show_searcher();
	

}

function addListenerMulti(el, s, fn) {
	s.split(' ').forEach(e => el.addEventListener(e, fn, false));
}

function show_ressource(){
	stringSend = "";
	elemForm = document.getElementsByName("formulaire_ressource")[0];
	
	if (elemForm[0].value != null){
		stringSend += elemForm[0].name + "=" + elemForm[0].value;
	}
	
	xhrRessource.open("POST","scripts/get_ressource.php",true);
	xhrRessource.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrRessource.send(stringSend);
}

function show_searcher(){
	stringSend = "";
	elemForm = document.getElementsByName("formulaire_chercheurs")[0];
	
	if (elemForm[0].value != null){
		stringSend += elemForm[0].name + "=" + elemForm[0].value;
	}
	
	xhrSearcher.open("POST","scripts/get_searcher.php",true);
	xhrSearcher.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrSearcher.send(stringSend);
}




function supprimerLig(id,cond,tab){
	entete = "id="+id; 
	entete += "&cond="+cond;
	entete += "&tab=" +tab; 
	
	xhrSupp = new XMLHttpRequest();
	xhrSupp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modifEtu").innerHTML = this.responseText;
		}
	};
	console.log(entete);

	xhrSupp.open("POST","scripts/php/suppLigneTable.php",true);
	xhrSupp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrSupp.send(entete);
	
	show_ressource();
}







/*
function modifierEtu(id){
	entete = "id="+id; 
	
	xhrMod = new XMLHttpRequest();
	xhrMod.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modifEtu").innerHTML = this.responseText;
		}
	};

	console.log(entete);

	xhrMod.open("POST","scripts/php/modifEtu.php",true);
	xhrMod.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrMod.send(entete);
}


function validerModif(id){
	entete = "OK=OK&id="+id+"&";

	elemFormM = document.getElementsByName("modification")[0];
	
	for (i=0;i != elemFormM.length;i++){
		if (elemFormM[i].value != null){
			entete += elemFormM[i].name + "=" + elemFormM[i].value;
			if (i != elemFormM.length-1){
				entete += "&";
			}
		}
	}
	
	xhrMod = new XMLHttpRequest();
	xhrMod.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modifEtu").innerHTML = this.responseText;
		}
	};
	console.log(entete);

	xhrMod.open("POST","scripts/php/modifEtu.php",true);
	xhrMod.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrMod.send(entete);
	
	show_ressource();
}

function ajoutEtu(){
	xhrAdd = new XMLHttpRequest();
	xhrAdd.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modifEtu").innerHTML = this.responseText;
		}
	};

	xhrAdd.open("POST","scripts/php/addEtu.php",true);
	xhrAdd.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrAdd.send();
}


function validerAjout(){
	entete = "";
	complet = "OK";
	elemFormA = document.getElementsByName("ajouter")[0];
	
	for (i=0;i != elemFormA.length;i++){
		if (elemFormA[i].value != null){
			entete += elemFormA[i].name + "=" + elemFormA[i].value;
			if (i != elemFormA.length-1){
				entete += "&";
			}
			//Si le champ est obligatoire
			if ((elemFormA[i].name == "nom") || (elemFormA[i].name == "prenom") || (elemFormA[i].name == "formation")){
				if (empty(elemFormA[i].value)){ //test si il est vide
					complet = "NA"; //bloque l'ajout dans l'annuaire
				}
			}
		}
	}
	entete += "&OK="+complet;
	
	xhrAdd = new XMLHttpRequest();
	xhrAdd.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("modifEtu").innerHTML = this.responseText;
		}
	};
	console.log(entete);

	xhrAdd.open("POST","scripts/php/addEtu.php",true);
	xhrAdd.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrAdd.send(entete);
	
	show_ressource();
}



function empty(obj) {
    for(var key in obj) {
        if(obj.hasOwnProperty(key))
            return false;
    }
    return true;
}*/