<?php

require_once("../config.php");

$requete="SELECT id_usr FROM utilisateur where nom like '".$_SESSION['id']."';";
//requete passee dans la commande  mysql_query
$resultat = mysqli_query($connexion,$requete);

//affichage du resultat utilisation de la commande mysql_fetch_row si il y a au moins 1 ligne
if (mysqli_num_rows($resultat) != 0){
	while ($ligne=mysqli_fetch_row($resultat)) {	
		foreach($ligne as $k => $val){
			$idd = $val;	
		}
	}
}

if (!empty($_POST['id'])){
	
	$reqres = "INSERT INTO reservation (id_chercheur, id_ressource, date, statut) values ('".$idd."',".$_POST['id'].",CURDATE(),1)";
	// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
	mysqli_query($connexion,$reqres) or die('Erreur SQL !<br />'.mysqli_error($connexion));
}
else{
	echo "erreur champs incomplet ...";
}

?>