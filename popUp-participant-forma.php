<?php
session_start();
include('mysql.inc.php');
?>
<button  class="close pull-right" data-dismiss="alert" onClick="fermerPopUp();">×</button>
<h2>Gestion des participants </h2>
<hr />
<form action="#" method="post" name="formParticipant" id="form">
<input type="hidden" name="numForma" value="<?php echo($_POST['num']); ?>"/>
 <div>
    <table>
            <tr>
                <td>
                    <select id="box1View" multiple="multiple" style="height:350px;width:250px;">
                        
			<?php
				$reqPersonnel="SELECT * from personnel ";
				$reqPersonnel=mysql_query($reqPersonnel);
				$resPersonnel=mysql_fetch_assoc($reqPersonnel);
				while($resPersonnel){
					echo "<option value='".$resPersonnel['numPersonnel']."'>".$resPersonnel['nom']." ".$resPersonnel['prenom']."</option>";
					$resPersonnel=mysql_fetch_assoc($reqPersonnel);
					
				}

			?>
                    </select><br/>
                </td>
                <td>
                    <button id="to2" type="button">&nbsp;>&nbsp;</button>

                    <button id="to1" type="button">&nbsp;<&nbsp;</button>
                </td>
                <td>
                    <select id="box2View" multiple="multiple" name="participant[]" style="height:350px;width:250px;">
                    </select><br/>
                </td>
            </tr>
        </table>
    </div>
</form>
<button id="appliPart" class="btn "><i class=" icon-ok"></i>Appliquer</button>&nbsp;&nbsp;<button class="btn" onClick="fermerPopUp();"><i class="icon-remove"></i>Annuler</button>

<script type="text/javascript">
$(function(){
 $.configureBoxes({ transferMode: 'copy', useFilters: false, useCounters: false });
});
</script>

