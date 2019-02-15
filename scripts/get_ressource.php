<?php

require_once("../config.php");
$requete="SELECT * FROM ressources";

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
				<th align="center" >Nom</th>
				<th align="center">Actions</th>
			</tr></thead>
		<tbody>
		<?php
		while ($ligne=mysqli_fetch_row($resultat)) {	
			echo "<tr>";
			foreach($ligne as $k => $val){	
				if ($k != 0){
					echo '<td align="center">'. $val.'</td>';
				}
			}
			?>
			<td align="center"> <input type='button' class="btn btn-outline-danger" name='supp' value='Supprimer' onclick='supprimerLig("<?php echo $ligne[0]; ?>","id_rsc","ressources")'/></td>
			<!--<td align="center"> <input type='button' class="btn btn-outline-primary" name='modif' value='modifier' onclick='modifierEtu("<?php //echo $ligne[0]; ?>")'/></td>-->
			
			</tr>
			<?php
		}
		echo "</tbody></table>"; ?>
	</div>
<?php
}
else{
	echo "Aucun résultat trouvé !<br/><br/>";
}



?>