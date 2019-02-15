<?php
//On inclut les fichiers nécessaires
require_once("config.php");
require_once($fichiersInclude.'header.html');
if (!estConnecte() OR $_SESSION['role'] != "chercheur") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
    header('Location: index.php'); #On redirige vers la page de connexion
    exit;
}
?>
<script src="scripts/afficher_chercheurs.js" type="text/javascript"></script>
<div id="test"></div>

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
							<input id = "input_ressource"type="text" class="form-control" aria-describedby="nom_input" name='nom'>
						</div>
					</div>
				
				</div><br/>
			</form>
			
			<div id='ressources'></div>
		</div>
	</div>
	
	
	<div class="col-lg-6 mbr-col-md-10">
        <div class="wrap">
			<div class='row'>
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
					<h4>Historique :</h4>
				</div>
			</div>
			<form name='formulaire_historique'>	
				<div class='row'>	
					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text" id="nom_input">Nom</span>
							</div>
							<input id ="input_hist" type="text" class="form-control" aria-describedby="nom_input" name='nom'>
						</div>
					</div>
				
				</div><br/>
			</form>
			
			<div id='historique'></div>
		</div>
	</div>
</div>
	

<form class="form-group" action="logout.php" method="post">
	<button type="submit" class="btn btn-danger" style="margin:20px;">Se déconnecter</button>
</form>


<?php
require_once($fichiersInclude.'footer.html'); 
?>