<?php 


include('mysql.inc.php');
$reqPerso="SELECT * from organisateur";
$reqPerso=mysql_query($reqPerso);
$resPerso=mysql_fetch_assoc($reqPerso);

?>
<?php
// CREATION D'un DATATABLE POUR LISTER LEs organisateurs

?>
<table id="tableau" class="display table table-bordered">
		<thead>
			<td>Num</td>
			<td>Nom</td>
			<td>Ville</td>
			<td>Sexe</td>
			<td>Date de Naissance</td>
			<td>Salaire</td>
			<td>Modif.</td>
			<td>Suppr.</td>
		</thead>
		<tbody>
			<?php
			while($resPerso){
		
				echo '<tr id="'.$resPerso['numOrganisateur'].'"><td>'.$resPerso['numOrganisateur'].'</td>
					<td>'.$resPerso['prenom'].' '.$resPerso['nom'].'</td>
					<td>'.$resPerso['ville'].'</td>
					<td>'.$resPerso['sexe'].'</td>
					<td>'.$resPerso['dateNaissance'].'</td>
					<td><i>'.$resPerso['salaire'].' €</i></td>
					<td><button class="btn modif" id="'.$resPerso['numOrganisateur'].'"><i class="icon-edit"></i></button></td>
					<td><button class="btn suppr" id="'.$resPerso['numOrganisateur'].'"><i class="icon-remove"></i></button></td>
			</tr>';
						$resPerso=mysql_fetch_assoc($reqPerso);
				}
?>
		</tbody>
</table>
