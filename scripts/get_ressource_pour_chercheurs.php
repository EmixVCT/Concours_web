<?php

require_once("../config.php");
$requete="SELECT nom FROM ressources WHERE id_rsc in (SELECT id_ressource FROM reservation where statut = 0)";
if (isset($_POST['nom']) and !empty($_POST['nom'])){
	$requete .= " where nom like '%".$_POST['nom']."%' ";
}
$requete .= ";";

//requete passee dans la commande  mysql_query
$resultat = mysqli_query($connexion,$requete);

//affichage du resultat utilisation de la commande mysql_fetch_row si il y a au moins 1 ligne
if (mysqli_num_rows($resultat) != 0){ ?>
	<div class="table-responsive table-wrapper-scroll-y table-sm table-condenced ">
		<table id='tab_ressources' border=1 align='center' class="table table-striped">
			<thead align="center"><tr>
				<th align="center" >NOM</th>
				<th></th>
			</tr></thead>
		<tbody>
		<?php
		while ($ligne=mysqli_fetch_row($resultat)) {	
			echo "<tr>";
			foreach($ligne as $k => $val){	
				echo '<td align="center">'. $val.'</td>';
			}
			?>
			<td align="center"> <input type='button' class="btn btn-outline-primary" name='reserver' value='Reserver' onclick='reserver("<?php echo $ligne[0]; ?>","id_rsc",$session_id)'/></td>
			
			</tr>
			<?php
		}
		echo "</tbody></table>"; ?>
	</div>
<?php
}
else{
	echo "Aucune ressource libre trouvée !<br/><br/>";
}



?>