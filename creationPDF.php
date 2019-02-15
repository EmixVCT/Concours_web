<?php 
	
	require_once("config.php");	
	require("fpdf/fpdf.php"); //lien vers le fichier contenant la classe FPDF
	require_once("fonctions.php") ; //On inclue la fonction de calcul des tableaux
	
	if (!estConnecte() OR $_SESSION['role'] != "admin") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
		header('Location: index.php'); #On redirige vers la page de connexion
		exit;
	}
	
	
	if (empty($_POST["date"])) {
		//echo '<script>alert("Veuillez entrer une date.")</script>' ;
		header('Location: admin.php');
	}
	
	define("FPDF_FONTPATH","fpdf/font/"); 
	//lien vers le dossier " font " 
	
	
	// CREATION DU PDF :
	$pdf = new FPDF("P","pt","A4"); 
	//création d'une instance de classe:
		//L = Landscape (orientation paysage)
		//pt pour point en unité de mesure
		//A4 pour le format
	
	$pdf ->AddPage(); //permet d'ajouter une page
	
	//Affichage de la date de génération du document
	$pdf ->SetFont('Times','',12); //choix de la police
	$pdf ->setXY(90,120) ;
	$pdf -> Cell(200,40, 'Utilisateur',1,0, 'C') ;
	$pdf ->setXY(290,120) ;
	$pdf -> Cell(200,40, 'Ressource',1,0, 'C') ;
	
	$x = 90 ;
	$y = 160 ;
	$pdf ->setXY(90,160) ;
	
	//Récupération de la date choisie
	$dateFormatBD = $_POST['date'] ;
	$date = date("d/m/Y", strtotime($_POST["date"])) ;
	
	
	//Récupération des données dans la base de données :
	$reqSelect="SELECT U.nom, R.nom FROM reservation, ressources R, utilisateur U 
					WHERE date='$dateFormatBD' AND id_chercheur=id_usr 
											AND id_ressource = id_rsc
					ORDER BY id_chercheur";
	
	$resultat=mysqli_query($connexion,$reqSelect);
	
	$informations = array() ;
	
	while ($ligne=mysqli_fetch_row($resultat)) {
		foreach($ligne as $num => $info) {
			if ($num == 0) {
				$pdf ->setXY($x,$y) ;
				$pdf -> Cell(200,40, $info,1,0, 'C') ;
				$x+=200 ;
			}
			if ($num == 1) {
				$pdf ->setXY($x,$y) ;
				$pdf -> Cell(200,40, $info,1,0, 'C') ;
				$x=90 ;
				$y+=40 ;
			}
	
		}
	} 
		
	//Affichage de la date de création du PDF (date courante)
	$pdf ->setXY(15,20) ;
	$pdf ->Write(0,date('j/n/Y')) ;
	
	//Titre et Logo
	$pdf ->SetFont('Times','B',15); //choix de la police
	//Affichage du titre et du logo
	$pdf ->setXY(110,70) ;
	$pdf -> Write(0, "Ressources reservées le $date") ;
	$pdf ->Image("images/uvsq.jpg",455,0, 150,92); //insertion du logo
	
	
	$pdf ->SetFont('Times','B',10); //choix de la police
	$pdf -> SetFillColor('150','150','150') ; // Choix de la couleur de remplissage
	
	
	
	//Pied de page : Informations diverses
	$pdf ->setXY(150,760) ;
	$pdf ->Write(0,"IUT de Vélizy - Concours Web 2019 - Département informatique") ;
	$pdf ->setXY(125,775) ;
	$pdf ->SetFont('Times','',7); //choix de la police
	$pdf ->Write(0,"VATHONNE Thomas - KACZMAREK Guillaume - HARDY Raphaël - PREVOT Carmen - VINCENT Maxime") ;
	$pdf ->Output(); //génère le PDF et l'affiche	

?>