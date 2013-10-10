<?php
session_start();
include('mysql.inc.php');
?>
<button  class="close pull-right" data-dismiss="alert" onClick="fermerPopUp();">×</button>
<h2>Ajout de Personnel </h2>
<hr />
<form action="#" method="post" name="formAjoutPerso" id="form">
<label> Nom : <input type="text" name="nom" id="nom" /></label>
<label> Prenom : <input type="text" name="prenom" id="prenom" /></label>
<label> Sexe :<select name="sexe" id="sexe">
		<option value="M">Masculin</option>
		<option value="F">Feminin</option>
</select></label>
<label> Date de Naissance :<input type="date" name="dateNaissance" id="dateNaissance" /></label>
<label> Adresse : <input type="text" name="adresse" id="adresse" /></label>
<label> Code Postal : <input type="number" name="codePostal" id="codePostal" /></label>
<label> Ville : <input type="text" name="ville" id="ville" /></label>
<label> Salaire : <div class="input-append"><input class="span2" type="number" name="salaire" id="salaire" /><span class="add-on">€</span></div> </label>
</form>
<button id="ajoutPerso" class="btn ajoutBdd"><i class=" icon-ok"></i>Ajouter</button>&nbsp;&nbsp;<button class="btn" onClick="fermerPopUp();"><i class="icon-remove"></i>Annuler</button>

	
