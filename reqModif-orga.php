<?php
include('mysql.inc.php');

if(!empty($_POST['nom']))
$nom=$_POST['nom'];
if(!empty($_POST['prenom']))
$prenom=$_POST['prenom'];
if(!empty($_POST['dateNaissance']))
$dateNaissance=$_POST['dateNaissance'];
if(!empty($_POST['sexe']))
$sexe=$_POST['sexe'];

if(!empty($_POST['ville']))
$ville=$_POST['ville'];
if(!empty($_POST['salaire']))
$salaire=$_POST['salaire'];
if(isset($nom) && isset($prenom) && isset($dateNaissance) && isset($ville) && isset($salaire) && isset($sexe)){

$reqModif="UPDATE organisateur SET nom='$nom', prenom='$prenom', dateNaissance='$dateNaissance', sexe='$sexe', ville='$ville', salaire='$salaire' WHERE numOrganisateur=".$_POST['numPerso'];


$resModif=mysql_query($reqModif);
if($resModif==false){
echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne n'a pas pu être ajoutée à la liste du personnel. Veuillez réessayer.</div>";
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne a bien été ajouté a la base de données.</div>";
}
else echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Merci de remplir tous les champs.</div>";


?>

