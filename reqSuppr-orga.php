<?php 
include('mysql.inc.php');
if(isset($_POST['id'])){
$req='DELETE FROM organisateur WHERE numOrganisateur='.$_POST['id'];
$res=mysql_query($req);
if($res==false){
	echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Cet organisateur n'a pas été supprimé. Veuillez réessayer</div>";
	
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>Cet organisateur a bien été supprimé.</div>";

}


?>
