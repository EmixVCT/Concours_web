window.onload = initPage;


function initPage(){
	
	var searchInput = document.getElementById("input_hist");
	addListenerMulti(searchInput, "change keydown paste input",function (event) {show_historique();} );
	
	var searchInput = document.getElementById("input_ressource");
	addListenerMulti(searchInput, "change keydown paste input",function (event) {show_ressource();} );
	
	
	show_ressource();
	show_historique();
	

}

function addListenerMulti(el, s, fn) {
	s.split(' ').forEach(e => el.addEventListener(e, fn, false));
}

function show_ressource(){
	xhrRessource = new XMLHttpRequest();
	xhrRessource.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("ressources").innerHTML = this.responseText;
		}
	};
	
	stringSend = "";
	elemForm = document.getElementsByName("formulaire_ressource")[0];
	
	if (elemForm[0].value != null){
		stringSend += elemForm[0].name + "=" + elemForm[0].value;
	}
	
	xhrRessource.open("POST","scripts/get_ressource_pour_chercheurs.php",true);
	xhrRessource.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrRessource.send(stringSend);
}

function show_historique(){
	xhrSearcher = new XMLHttpRequest();
	xhrSearcher.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("historique").innerHTML = this.responseText;
		}
	};
	
	stringSend = "";
	elemForm = document.getElementsByName("formulaire_historique")[0];
	
	if (elemForm[0].value != null){
		stringSend += elemForm[0].name + "=" + elemForm[0].value;
	}
	
	xhrSearcher.open("POST","scripts/get_historique.php",true);
	xhrSearcher.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrSearcher.send(stringSend);
}





function reserver(id){
	entete = "id="+id; 

	xhrReserver = new XMLHttpRequest();

	xhrReserver.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("test").innerHTML = this.responseText;
			show_ressource();
			show_historique();
		}
	};
	
	console.log(entete);

	xhrReserver.open("POST","scripts/reservation.php",true);
	xhrReserver.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhrReserver.send(entete);
}


