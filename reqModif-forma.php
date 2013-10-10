<?php
include('mysql.inc.php');

if(!empty($_POST['organisateur']))
$numOrganisateur=$_POST['organisateur'];
if(!empty($_POST['description']))
$description=$_POST['description'];
if(!empty($_POST['nomForma']))
$nomForma=$_POST['nomForma'];
if(!empty($_POST['dateForma']))
$dateForma=$_POST['dateForma'];
if(!empty($_POST['debutCours']))
$debutCours=$_POST['debutCours'];
if(!empty($_POST['finCours']))
$finCours=$_POST['finCours'];
if(!empty($_POST['cout']))
$cout=$_POST['cout'];
if(isset($numOrganisateur) && isset($description) && isset($dateForma) && isset($nomForma) && isset($cout)){

$reqModif="UPDATE formation SET nomFormation='$nomForma', descFormation='$description', dateFormation='$dateForma', debutCours='$debutCours', finCours='$finCours', cout='$cout', numOrganisateur=$numOrganisateur WHERE numFormation=".$_POST['numForma'];


$resModif=mysql_query($reqModif);
if($resModif==false){
echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>La formation n'a pas pu être ajoutée. Veuillez réessayer.".mysql_error()."</div>";
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>La formation a bien été ajouté a la base de données. Pensez à y ajouter des participants !</div>";
}
else echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Merci de remplir tous les champs.</div>";


?>

