<?php 
include('mysql.inc.php');
if(isset($_POST['id'])){
$req='DELETE FROM formation WHERE numFormation='.$_POST['id'];
$res=mysql_query($req);
if($res==false){
	echo "<div class='alert alert-error'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette formation n'a pas été supprimée. Veuillez réessayer".$req."</div>";
	
}
else echo "<div class='alert alert-success'> <a class='close' data-dismiss='alert' href='#'>×</a>Cette formation a bien été supprimée.</div>";

}


?>
