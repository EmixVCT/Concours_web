<?php
include "include/header.html";
?>

	<br/><h1>Accueil - Home Page</h1>
	<br/>


	<h3>Sécurité</h3>
	<h4>Authentification</h4>
	<p>Le site possède deux types de compte ; un compte administrateur et plusieurs comptes utilisateurs.
	Les chercheurs ne peuvent pas accéder aux fonctionnalités de l'administrateur. La sécurité de l'authentification est assurée
	par un hachage des mots de passe. Ainsi, les mots de passe ne sont pas stoqués en clair, minimisant les risques de vol de comtpe.</p>	
	<h4>Déconnexion</h4>
	<p>Une déconnexion propre et sécurisée est fournie par le site. En outre, cela évite l'accès à des pages non autorisées.</p>	

	<h3>En tant qu'utilisateur...</h3>
	<p>Je peux :
		<li>Réserver une ressource pour une journée donnée.</li>
		<li>Voir l'historique de mes ressources réservées.</li>
	</p>

	<h3>En tant qu'administrateur...</h3>
	<p>Je peux :
		<li>Visualiser la liste courante des ressources et des chercheurs.</li>
		<li>Ajouter ou supprimer une ressource ou un chercheur à l'aide d'un menu.</li>
		<li>Générer un document PDF listant les ressources utilisées pour le jour que je renseigne.</li>
	</p>
	<br/>
	<br/>
	<h3>Security</h3>
	<h4>Log in</h4>
	<p>This website has two types of account : an administrator account and severals users accounts.
	Research workers cannot access to the administrator features. The secure log in is ensured by
	hash of passwords. Therefore, passwords are not saved unencrypted in the database, minimizing the risk of stolen account.
	</p>	
	<h4>Log out</h4>
	<p>A clean and secured log out is ensured by this website. Moreover, it avoid unauthorized access to pages.
	</p>	

	<h3>As a user...</h3>
	<p>I can :
		<li>Register a resource for a choosen day.</li>
		<li>See the history of my reserved resources.</li>
	</p>

	<h3>As an administrator...</h3>
	<p>I can :
		<li>Oversee the current list of resources and seekers.</li>
		<li>Add or delete a resource or a seeker with a menu.</li>
		<li>Create a PDF file listing the used resources for a selected day.</li>
	</p>
	<br/>

	<h3>Bonne navigation ! - Enjoy your navigation !</h3>
	<form class="form-group" action="connect.php" method="post">
		<button type="submit" class="btn btn-danger" style="margin:20px;">S'authentifier</button>
	</form>

<?php	
include "include/footer.html";