<?php
include('mysql.inc.php');


$num=explode('-',$_POST['num']);

$reqSupprParticipant="DELETE FROM participant where numPersonnel=".$num[0]." AND numFormation=".$num[1];

$resSupprParticipant=mysql_query($reqSupprParticipant);

?>
