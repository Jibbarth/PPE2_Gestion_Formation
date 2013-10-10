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
<h2>Modification de l'organisateur n° <?php echo $resModif['numOrganisateur']; ?> </h2>
<hr />
<form action="#" method="post" name="formModifOrga" id="form">
<input type="hidden" name="numPerso" value="<?php echo $resModif['numOrganisateur']; ?>"/>
<label> Nom : <input type="text" name="nom" id="nom" value="<?php echo $resModif['nom']; ?>"/></label>
<label> Prenom : <input type="text" name="prenom" id="prenom" value="<?php echo $resModif['prenom']; ?>"/></label>
<label> Sexe :<select name="sexe" id="sexe">
		<option value="M">Masculin</option>
		<option value="F">Feminin</option>
</select></label>
<label> Date de Naissance :<input type="date" name="dateNaissance" id="dateNaissance" value="<?php echo $resModif['dateNaissance']; ?>" /></label>
<label> Ville : <input type="text" name="ville" id="ville" value="<?php echo $resModif['ville']; ?>" /></label>
<label> Salaire : <div class="input-append"><input class="span2" type="number" name="salaire" id="salaire" value="<?php echo $resModif['salaire']; ?>"/><span class="add-on">€</span></div> </label>
</form>
<button id="modifOrga" class="btn modifBdd"><i class=" icon-ok"></i>Modifier</button>&nbsp;&nbsp;<button class="btn" onClick="fermerPopUp();"><i class="icon-remove"></i>Annuler</button>

	
