<?php

require_once("../config.php");

if (!empty($_POST['tab']) and !empty($_POST['id']) and !empty($_POST['cond'])){
	
	if ($_POST['tab'] == 'ressources'){
		$requete="SELECT * FROM reservation where statut=1 and id_ressource = '".$_POST['id']."';";

		//requete passee dans la commande  mysql_query
		$resultat = mysqli_query($connexion,$requete);
		//si il y a au moins 1 ligne
		if (mysqli_num_rows($resultat) == 0){
			$reqsuppr = "DELETE from ".$_POST['tab']." WHERE ".$_POST['cond']." = '".$_POST['id']."'";
			// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
			mysqli_query($connexion,$reqsuppr) or die('Erreur SQL !<br />'.mysqli_error($connexion));
		}else{
			afficherErreur("Impossible de supprimer une ressource réservée");
		}
	}else{
		$reqsuppr = "DELETE from ".$_POST['tab']." WHERE ".$_POST['cond']." = '".$_POST['id']."'";
		// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		mysqli_query($connexion,$reqsuppr) or die('Erreur SQL !<br />'.mysqli_error($connexion));
	}

			
			
	
}
else{
	echo "erreur champs incomplet ...";
}

?>