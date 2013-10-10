<?php
session_start();
include('mysql.inc.php');
$type=$_POST['type'];
if($type=="perso") $type="personnel";
if($type=="orga") $type="organisateur";
if($type=="forma") $type="formation";
$num="num".$type;

$reqModif = "SELECT * from ".$type." where ".$num."=".$_POST['num'];
$reqModif=mysql_query($reqModif);
$resModif=mysql_fetch_assoc($reqModif);

?>
<button  class="close pull-right" data-dismiss="alert" onClick="fermerPopUp();">×</button>
<h2>Modification de la formation n° <?php echo $resModif['numFormation'];?> </h2>
<hr />
<form action="#" method="post" name="formModifForma" id="form">
<input type="hidden" name="numForma" value="<?php echo $resModif['numFormation'];?>" />
<?php
	
	$reqListeOrganisateur='SELECT * from organisateur ';
	$reqListeOrganisateur=mysql_query($reqListeOrganisateur);
	$resListeOrganisateur=mysql_fetch_assoc($reqListeOrganisateur);
	echo '<label>Organisateur : <select name="organisateur" id="organisateur">
		<option value=""></option>';
		while($resListeOrganisateur){
			echo '<option value="'.$resListeOrganisateur['numOrganisateur'].'">'.$resListeOrganisateur['nom'].' '.utf8_encode($resListeOrganisateur['prenom']).'</option>';
			$resListeOrganisateur=mysql_fetch_assoc($reqListeOrganisateur);
		}
?>
</select></label>
<label> Nom Formation : <input type="text" name="nomForma" id="nomForma" value="<?php echo $resModif['nomFormation'];?>"/></label>
<label> Description : <textarea type="text" name="description" id="description"  style="height:100px; display:block"  ><?php echo $resModif['descFormation'];?></textarea></label>
<label> Date <input type="date" name="dateForma" id="dateForma" value="<?php echo $resModif['dateFormation'];?>"/></label>
<label> Debut cours <input type="text" name="debutCours" id="debutCours" value="<?php echo $resModif['debutCours'];?>" /></label>
<label> Fin cours <input type="text" name="finCours" id="finCours" value="<?php echo $resModif['finCours'];?>"/></label>
<label> Couts  <div class="input-append"><input class="span2" type="number" name="cout" id="cout" value="<?php echo $resModif['cout'];?>" /><span class="add-on">€</span></div> </label>
</form>
<button id="modifForma" class="btn modifBdd"><i class=" icon-ok"></i>Ajouter</button>&nbsp;&nbsp;<button class="btn" onClick="fermerPopUp();"><i class="icon-remove"></i>Annuler</button>

	
