<?php 
  
require_once("config.php");
require_once($fichiersInclude.'header.html');

if (!estConnecte() OR $_SESSION['role'] != "admin") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
    header('Location: index.php'); #On redirige vers la page de connexion
    exit;
}

if ( (isset($_POST['pwd_conf'],$_POST['pwd'],$_POST["id"])) AND !(empty($_POST['id']) && empty($_POST['pwd']) && empty($_POST['pwd_conf'])) ) { #On vérifie la validité du formulaire

	if ($_POST['pwd_conf'] == $_POST['pwd']){
		
		$req = "INSERT INTO utilisateur (nom,mdp,rang) VALUES ('".$_POST['id']."','".hash('sha512',$_POST['pwd'])."',1);";
		mysqli_query($connexion,$req) or die('Erreur SQL !<br />'.mysqli_error($connexion));
		header('Location: admin.php');
	}else{
		header('Location: ajout_chercheur.php?erreur='.sha1("C'est une erreur !"));
	}
}	
	

else { #Si l'envoi du formulaire est incorrect ou que l'on accède à la page d'une autre façon
	?>
	<div id="container" class="container mt-5">

		<div class="row mt-2">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
			<h1>Ajouter nouveau chercheur</h1>
		  </div>
		</div>

		<form class="form-group" action="" method="post">
			<hr>
			<?php 
			
			  if (isset($_GET['erreur'])) { #Si il y a eu une erreur on l'affiche
				afficherErreur("Les <strong>mot de passe</strong> doivent être identique !");
			  }
			?>
			<div class="row">

			<div class="col-md-3"></div>
			<div class="col-md-6">
			  <label for="id">Identifiant :</label>
			  <input type="text" class="form-control" id="id" name="id" placeholder="Identifiant" required>
			</div>
		  </div>

		  <div class="row mt-2">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			  <label for="pwd">Mot de passe :</label>
			  <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mot de passe" required>
			</div>
		  </div>
		  
		  <div class="row mt-2">
			<div class="col-md-3"></div>
			<div class="col-md-6">
			  <label for="pwd_conf">Mot de passe (confirmation) :</label>
			  <input type="password" class="form-control" id="pwd_conf" name="pwd_conf" placeholder="Mot de passe" required>
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