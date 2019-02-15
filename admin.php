<?php
//On inclut les fichiers nécessaires
require_once("config.php");
require_once($fichiersInclude.'head.php');

if (!estConnecte() OR $_SESSION['role'] != "admin") { #Si on arrive sur cette page alors que l'on est pas connecté / ou que l'on n'est pas un administrateur
    header('Location: index.php'); #On redirige vers la page de connexion
    exit;
}
?>

<form class="form-group" action="logout.php" method="post">
	<button type="submit" class="btn btn-danger" style="margin:20px;">Se déconnecter</button>
</form>


<?php
require_once($fichiersInclude.'footer.php'); 
?>