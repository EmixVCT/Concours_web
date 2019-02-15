<?php
require_once('config.php');

if ( (isset($_POST['id']) && isset($_POST['pwd'])) AND !(empty($_POST['id']) && empty($_POST['pwd'])) ) { #On vérifie la validité du formulaire

		$login = htmlspecialchars($_POST["id"]);
		$mdp = hash("sha512",htmlspecialchars($_POST["pwd"]));	
		$req = "SELECT * FROM utilisateur WHERE nom like \"$login\" and mdp like \"$mdp\"";
		
		if ($res = mysqli_query($connexion,$req)){ //test si la commande est bien exec
			$rowcount=mysqli_num_rows($res);
			
			if ($rowcount == 1) { //test si on a un resultat
				$lig = mysqli_fetch_assoc($res);
				
				$_SESSION['id'] = $lig['nom'];

				if($lig['rang'] == 1){ //Si c'est un chercheur
					$_SESSION['role'] = "chercheur";
					header('Location: accueil.php');
					exit;
				}else{ //Sinon c'est un admin
					$_SESSION['role'] = "admin";
					header('Location: admin.php');
					exit;
				}

			}else{ //pas de mdp et login correct trouver (redirection)
				header('Location: connect.php?erreur='.sha1("C'est une erreur !"));
				exit;
			}
			
		}else{ 
			echo "Impossible d\'accéder à la table UTILISATEUR !";
		}
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
