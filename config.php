<?php
    session_start(); //Permet de démarrer les sessions sur toutes les pages
    require_once('fonctions.php');
	
	
	//Variables globales
	
	$fichiersInclude = "include/";
	$serveur = "localhost";
	$login = "root";
	$mdp = "";

	//connexion au serveur mysql (ici localhost)
	$connexion=mysqli_connect($serveur,$login,$mdp) 
	or die("Connexion impossible au serveur $serveur pour $login");


	//nom de la base de donnees
	$bd="concoursweb";

	//connexion à la base de donnees
	mysqli_select_db($connexion,$bd)
	or die("Impossible d'accèder à la base de données");	
?>