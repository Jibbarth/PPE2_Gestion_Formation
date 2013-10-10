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
if(!empty($_POST['adresse']))
$adresse=$_POST['adresse'];
if(!empty($_POST['codePostal']))
$codePostal=$_POST['codePostal'];
if(!empty($_POST['ville']))
$ville=$_POST['ville'];
if(!empty($_POST['salaire']))
$salaire=$_POST['salaire'];
if(isset($nom) && isset($prenom) && isset($dateNaissance) && isset($adresse) && isset($codePostal) && isset($ville)){

$reqAjoutPerso="INSERT INTO personnel values ('', '$prenom','$nom','$adresse', '$codePostal','$ville', '$dateNaissance', '$sexe','$salaire')";


$resAjoutPerso=mysql_query($reqAjoutPerso);
if($resAjoutPerso==false){
echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne n'a pas pu être ajoutée à la liste du personnel. Veuillez réessayer.</div>";
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne a bien été ajouté a la base de données.</div>";
}
else echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Merci de remplir tous les champs.</div>";


?>

