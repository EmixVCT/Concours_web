<?php
require_once("config.php");
require_once($fichiersInclude.'header.html');

if (!estConnecte() OR $_SESSION['role'] != "admin") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
    header('Location: index.php'); #On redirige vers la page de connexion
    exit;
}

if ( isset($_POST['nom']) AND !empty($_POST['nom']) ) { #On vérifie la validité du formulaire

	$req = "INSERT INTO ressources (nom) VALUES ('".$_POST['nom']."');";
	mysqli_query($connexion,$req) or die('Erreur SQL !<br />'.mysqli_error($connexion));
	header('Location: admin.php');

}else { #Si l'envoi du formulaire est incorrect ou que l'on accède à la page d'une autre façon
	?>
	<div id="container" class="container mt-5">

		<div class="row mt-2">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
			<h2>Ajouter une nouvelle ressource</h2>
		  </div>
		</div>

		<form class="form-group" action="" method="post">
			<hr>
			<div class="row">

			<div class="col-md-3"></div>
			<div class="col-md-6">
			  <label for="nom">Nom :</label>
			  <input type="text" class="form-control" id="nom" name="nom" placeholder="Ressource" required>
			</div>
		  </div>


		  <div class="row mt-2">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			  <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Ajouter</button>
			</div>
		  </div>

		</form>
		
		<form class="form-group" action="admin.php" method="post">
			<button type="submit" class="btn btn-outline-danger" style="margin:20px;"><i class="fas fa-angle-left"></i> Retour</button>
		</form>
	</div>
	<?php
}
require_once($fichiersInclude.'footer.html'); #On inclut le pied de page ?>