<?php

    session_start(); //Permet de démarrer les sessions sur toutes les pages
    require_once('fonctions.php');
	
	//Variables globales
	
	$fichiersInclude = "include/";
	$serveur = "localhost";
	$login = "root";
	$mdp = "";
	$dbname = "concoursweb";

	try
	{
		$connexion = new PDO('mysql:host='.$serveur.';dbname='.$dbname.';charset=utf8', $login, $mdp);
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}

?>