<?php 

include('mysql.inc.php');
$reqForma="SELECT * from formation";
$reqForma=mysql_query($reqForma);
$resForma=mysql_fetch_assoc($reqForma);

?>
<?php
// CREATION D'un DATATABLE POUR LISTER LES Formation

?>
<table id="tableau" class="display table table-bordered">
		<thead>
			<td>Formation</td>
			<td>Nom Organisateur</td>
			<td>Liste Participant</td>
			<td>Date / Durée</td>
			<td>Description Formation</td>
			<td>Cout</td>
			<td>Gest. Part.</td>
			<td>Modif.</td>
			<td>Suppr.</td>
		</thead>
		<tbody>
			<?php
			while($resForma){
		
				echo '<tr id="'.$resForma['numFormation'].'"><td>'.$resForma['nomFormation'].'</td>
					<td>';
						// Recuperation du nom organisateur
						$reqnomOrga="select * from organisateur where numOrganisateur='".$resForma['numOrganisateur']."'";
						$reqnomOrga=mysql_query($reqnomOrga);
						$reqnomOrga=mysql_fetch_assoc($reqnomOrga);
						echo $reqnomOrga['nom']." ".$reqnomOrga['prenom'];
				echo '</td>
					<td>';
						// Recuperation num participant a la formation puis nom et prenom, affichage
						$reqNumParticipant="SELECT * from participant where numFormation='".$resForma['numFormation']."'";
						$reqNumParticipant=mysql_query($reqNumParticipant);
						$resNumParticipant=mysql_fetch_assoc($reqNumParticipant);
						while($resNumParticipant){
							$reqNomParticipant="SELECT * FROM personnel where numPersonnel=".$resNumParticipant['numPersonnel'];
							$reqNomParticipant=mysql_query($reqNomParticipant);
							$resNomParticipant=mysql_fetch_assoc($reqNomParticipant);
							echo "<a class='close supprPart' id=".$resNumParticipant['numPersonnel']."-".$resForma['numFormation']." href='#'>×</a>".$resNomParticipant['nom']." ".$resNomParticipant['prenom']."<br /> ";
							$resNumParticipant=mysql_fetch_assoc($reqNumParticipant);
						}
						
					echo '</td>
					<td>'.$resForma['dateFormation'].'</td>
					<td>'.$resForma['descFormation'].'</td>
					<td><i>'.$resForma['cout'].' €</i></td>
					<td><button class="btn part"  id="'.$resForma['numFormation'].'"><i class="icon-user"></i></button></td>
					<td><button class="btn modif" id="'.$resForma['numFormation'].'"><i class="icon-edit"></i></button></td>
					<td><button class="btn suppr" id="'.$resForma['numFormation'].'"><i class="icon-remove"></i></button></td>
			</tr>';
						$resForma=mysql_fetch_assoc($reqForma);
				}
?>
		</tbody>
	</table>
