<?php
//On inclut les fichiers nécessaires
require_once("config.php");
require_once($fichiersInclude.'header.html');

if (!estConnecte() OR $_SESSION['role'] != "admin") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
    header('Location: index.php'); #On redirige vers la page de connexion
    exit;
}
?>
<script src="scripts/afficher.js" type="text/javascript"></script>

<div id="erreur"></div>

<div class="row mbr-justify-content-center">
	<div class="col-lg-6 mbr-col-md-10">
        <div class="wrap">
		
			<!-- Formulaire recherche -->
			<div class='row'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
					<h4>Recherche de ressources :</h4>
				</div>
			</div>
			<form name='formulaire_ressource'>	
				<div class='row'>	
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text" id="nom_input">Nom</span>
							</div>
							<input id = "input_ressource" type="text" class="form-control" aria-describedby="nom_input" name='nom'>
						</div>
					</div>
				</div><br/>
			</form>
			
			<div id='ressources'></div>
			
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				
				<form action="ajout_ressources.php" method="POST">
					<h4>
					Ajouter une nouvelle ressource :
					<button id ="ajouter_ressource" class="btn btn-outline-primary" style="margin:20px;">Ajouter</button>
				</form>
				</h4>
			</div>

		</div>
	</div>
	
	
	<div class="col-lg-6 mbr-col-md-10">
        <div class="wrap">
			<div class='row'>
				<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
					<h4>Recherche de chercheurs :</h4>
				</div>
			</div>
			<form name='formulaire_chercheurs'>	
				<div class='row'>	
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text" id="nom_input">Nom</span>
							</div>
							<input id="input_chercheur" type="text" class="form-control" aria-describedby="nom_input" name='nom'>
						</div>
					</div>
				</div><br/>
			</form>
			
			<div id='searchers'></div>
			
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				
				<form action="ajout_chercheur.php" method="POST">
					<h4>
					Ajouter un nouveau chercheur :
					<button id ="ajouter_chercheur" class="btn btn-outline-primary" style="margin:20px;">Ajouter</button>
				</form>
				</h4>
			</div>
		</div>
	</div>
</div>
	
<table>
		<tr>
			<td>
				<label>Générer un PDF listant les ressources réservées pour un jour choisi :</label>
				<form class="form-group" action="creationPDF.php" method="post">
					<input type="date" name="date" id="date"></input>
					<button type="submit" class="btn btn-info" style="margin:20px;">Générer le PDF</button>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<form class="form-group" action="logout.php" method="post">
					<button type="submit" class="btn btn-danger" style="margin:20px;">Se déconnecter</button>
				</form>
			</td>
		</tr>
</table>

<?php
require_once($fichiersInclude.'footer.html'); 
?>