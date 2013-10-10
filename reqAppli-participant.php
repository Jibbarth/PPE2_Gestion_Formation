<?php
include('mysql.inc.php');
if(isset($_POST['participant'])){
$nb=count($_POST['participant']);

for($i=0; $i<$nb;$i++){
	$reqInsertParticipant="INSERT INTO participant values (".$_POST['numForma'].",".$_POST['participant'][$i].", 1)";
	$resInsertParticipant=mysql_query($reqInsertParticipant);
	}
}

?>
