<?php

require_once("../config.php");


if (isset($_POST['nom']) and !empty($_POST['nom'])){
	$req = $connexion->prepare('SELECT nom FROM ressources WHERE nom LIKE %?%');
	$req->execute(array($_POST['nom']));
}
else {
	$req="SELECT nom FROM ressources";
	$req = $connexion->query($req);
}

if ($req->rowCount() != 0)
{ ?>
	<div class="table-responsive table-wrapper-scroll-y table-sm table-condenced ">
		<table id='tab_ressources' border=1 align='center' class="table table-striped">
			<thead align="center"><tr>
				<th align="center">NOM</th>
				<th></th><th></th>
			</tr></thead>
		<tbody>
		<?php


		while ($donnees = $req->fetch()) {	
			echo "<tr>";
			echo '<td align="center">'. $donnees['nom'].'</td>';
			?>
			<td align="center"> <input type='button' class="btn btn-outline-danger" name='supp' value='supprimer' onclick='supprimerLig("<?php echo $ligne[0]; ?>","id","info")'/></td>
			<td align="center"> <input type='button' class="btn btn-outline-primary" name='modif' value='modifier' onclick='modifierEtu("<?php echo $ligne[0]; ?>")'/></td>
			
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

$req->closeCursor();

?>