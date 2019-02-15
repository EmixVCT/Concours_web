<?php

require_once("../config.php");

if (!empty($_POST['tab']) and !empty($_POST['id']) and !empty($_POST['cond'])){
	
	$reqsuppr = "INSERT INTO reservation (id_chercheur, id_ressource, date, statut) values (".$_SESSION['id'].",CURRENTDATE,1)";
	// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
	mysqli_query($connexion,$reqsuppr) or die('Erreur SQL !<br />'.mysqli_error($connexion));
	echo $reqsuppr;
}
else{
	echo "erreur champs incomplet ...";
}

?>