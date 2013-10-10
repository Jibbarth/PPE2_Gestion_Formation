<?php
session_start();
include('mysql.inc.php');
?>
<button  class="close pull-right" data-dismiss="alert" onClick="fermerPopUp();">×</button>
<h2>Ajout d'une Formation </h2>
<hr />
<form action="#" method="post" name="formAjoutForma" id="form">
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
<label> Nom Formation : <input type="text" name="nomForma" id="nomForma" /></label>
<label> Description : <textarea type="text" name="description" id="description" style="height:100px; display:block" placeholder="Entrez ici la description de la formation" /></label>
<label> Date <input type="date" name="dateForma" id="dateForma"/></label>
<label> Debut cours <input type="text" name="debutCours" id="debutCours" /></label>
<label> Fin cours <input type="text" name="finCours" id="finCours" /></label>
<label> Couts  <div class="input-append"><input class="span2" type="number" name="cout" id="cout" /><span class="add-on">€</span></div> </label>
</form>
<button id="ajoutForma" class="btn ajoutBdd"><i class=" icon-ok"></i>Ajouter</button>&nbsp;&nbsp;<button class="btn" onClick="fermerPopUp();"><i class="icon-remove"></i>Annuler</button>

	
