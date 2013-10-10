<?php 


include('mysql.inc.php');
$reqPerso="SELECT * from personnel";
$reqPerso=mysql_query($reqPerso);
$resPerso=mysql_fetch_assoc($reqPerso);

?>
<?php
// CREATION D'un DATATABLE POUR LISTER LE Personnel

?>
<table id="tableau" class="display table table-bordered">
		<thead>
			<td>Nom </td>
			<td>Adresse</td>
			<td>Code Postal</td>
			<td>Ville</td>
			<td>Date de Naissance</td>
			<td>Salaire</td>
			<td>Modif.</td>
			<td>Suppr.</td>
		</thead>
		<tbody>
			<?php
			while($resPerso){
		
				echo '<tr id="'.$resPerso['numPersonnel'].'"><td>';
					if($resPerso['sexe']=='M') echo 'Mr';
					else if($resPerso['sexe']=='F') echo 'Mme ';

					echo' '.$resPerso['nom'].' '.$resPerso['prenom'].'</td>
					<td>'.$resPerso['adresse'].'</td>
					<td>'.$resPerso['codePostal'].'</td>
					<td>'.$resPerso['ville'].'</td>
					<td>'.$resPerso['dateNaissance'].'</td>
					<td><i>'.$resPerso['salaire'].' €</i></td>
					<td><button class="btn modif" id="'.$resPerso['numPersonnel'].'"><i class="icon-edit"></i></button></td>
					<td><button class="btn suppr" id="'.$resPerso['numPersonnel'].'"><i class="icon-remove"></i></button></td>
			</tr>';
			$resPerso=mysql_fetch_assoc($reqPerso);
				}
?>
		</tbody>
	</table>
