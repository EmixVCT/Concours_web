<?php

require_once('config.php');

if ( (isset($_POST['id']) && isset($_POST['pwd'])) AND !(empty($_POST['id']) && empty($_POST['pwd'])) ) { #On vérifie la validité du formulaire

		$login = htmlspecialchars($_POST["id"]);
		$mdp = hash("sha512",htmlspecialchars($_POST["pwd"]));	

		$req = $connexion->prepare('SELECT * FROM utilisateur WHERE nom like ? and mdp like ?');
		$req->execute(array($login, $mdp));

		while ($donnees = $req->fetch())
		{
			print_r($donnees);

			if ($donnees['nom'] == $_POST['id'] AND $donnees["mdp"] == hash("sha512", $_POST["pwd"])) {
				
				$_SESSION['id'] = $donnees["nom"];

				if($donnees['rang'] == 1){ //Si c'est un chercheur
					$_SESSION['role'] = "chercheur";
					header('Location: accueil.php');
					exit;
				}
				else //Sinon c'est un admin
				{ 
					$_SESSION['role'] = "admin";
					header('Location: admin.php');
					exit;
				}

			}
		}

		$req->closeCursor();
	 	//Pas de mdp et login correct trouvés (redirection)
		header('Location: connect.php?erreur='.sha1("C'est une erreur !"));
		exit;

}

else { #Si l'envoi du formulaire est incorrect ou que l'on accède à la page d'une autre façon

    if (estConnecte()) { #Si on est déjà connecté lorsque on accède à la page
        redirigerBonnePage();
    }
    
    #Sinon on renvoie à la page de connexion
    header('Location: connect.php?erreur='.sha1("C'est une erreur !"));
    exit;
}
?>
