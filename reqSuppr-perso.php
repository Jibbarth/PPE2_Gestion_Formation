<?php 
include('mysql.inc.php');
if(isset($_POST['id'])){
$req='DELETE FROM personnel WHERE numPersonnel='.$_POST['id'];
$res=mysql_query($req);
if($res==false){
	echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne n'a pas été supprimée. Veuillez réessayer</div>";
	
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette personne a bien été supprimée.</div>";

}


?>
