<?php
include('mysql.inc.php');
?>

<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
	<meta charset="UTF-8">
	<title>Gestion des formations</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/jquery.confirm.css" media="all" />
<style type="text/css" title="currentStyle">
			@import "css/demo_page.css"; 
		
			@import "css/demo_table.css";
			
		</style>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.confirm.js"></script>
<script type="text/javascript" src="js/jquery.duallistbox.js"></script>
<script type="text/javascript">
function fermerPopUp()
	{
		$( "#popUpAffichage" ).hide();
		$("#popUpAffichage").removeClass('large');
		$( "#popUpAffichage" ).empty();
		boutonOuvrirFicheAjouter();
		
	}
function boutonOuvrirFicheAjouter(){
$('#ajout').click(function()
{
var tab = $('body').attr('id');
		$.ajax({
			url:"popUp-ajout-"+tab+".php",
					
					success: function(data)
						{
							
							$( "#popUpAffichage" ).show();
							$( "#popUpAffichage" ).empty();
							$( "#popUpAffichage" ).append(data);
							ajoutBdd();
				
						}
				});
				
				
				
				
		});

}
function ajoutBdd()
	{
		$('.ajoutBdd').click(function()
		{
			var tab = $('body').attr('id');
				$.ajax({
					type:"post",
					url:"reqAjout-"+tab+".php",
					data : $('#form').serialize(),
					success: function(data)
						{
							$('#notif').show();
							$('#notif').empty();
							$('#notif').append(data);	
							$( "#popUpAffichage" ).hide().removeClass('large');
							$( "#popUpAffichage" ).empty();
							contenuTab();
						}
				});	
		});
}

function ouvrirFicheModif(){
$('.modif').click(function(){
	
	var tab = $('body').attr('id');
	var num = $(this).attr('id');
		$.ajax({
			type:'post',
			data: { num : num,
				type : tab
				 },
			url:"popUp-modif-"+tab+".php",
					
					success: function(data)
						{
							
							$( "#popUpAffichage" ).show();
							$( "#popUpAffichage" ).empty();
							$( "#popUpAffichage" ).append(data);
							modifBdd();
				
						}
				});
				
		});

}

function modifBdd(){
$('.modifBdd').click(function(){
	var tab = $('body').attr('id');
	$.ajax({
		type:"post",
		url:"reqModif-"+tab+".php",
		data : $('#form').serialize(),
		success: function(data)
		{
			$('#notif').show();
			$('#notif').empty();
			$('#notif').append(data);	
			$( "#popUpAffichage" ).hide().removeClass('large');
			$( "#popUpAffichage" ).empty();
			contenuTab();
			}
		});

});

}

function supprBdd(){
$('.suppr').click(function(){
	
	var tab = $('body').attr('id');
	var num = $(this).attr('id');
	$.confirm({
	'title'		: 'Confirmation de suppression',
	'message'	: 'Êtes vous sûr de vouloir supprimer ?  ',
	'buttons'	: {
		'Oui'	: {
			'class'	: 'blue',
			'action': function(){
			$.ajax({
				type:'post',
				data: { id : num },					
				url:'reqSuppr-'+tab+'.php',
				success : function(data){
				$('#notif').show();
				$('#notif').empty();
				$('#notif').append(data);
				
				}
			});
			contenuTab();
			}
		},
		'Non'	: {
			'class'	: 'gray',
			'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
			}
		}
	});
});
}

function gestParticipant(){
$('.part').click(function(){
var num = $(this).attr('id');
		$.ajax({
			type:'post',
			data: { num : num },
			url:"popUp-participant-forma.php",
					
					success: function(data)
						{
							
							$( "#popUpAffichage" ).show().addClass('large');
							$( "#popUpAffichage" ).empty();
							$( "#popUpAffichage" ).append(data);
							enregistrementParticipant();
						

						}
				});

});

}

function supprParticipant(){
	$('.supprPart').click(function(){
		
		var num = $(this).attr('id');
		
		$.ajax({
			type:'post',
			data: { num : num },
			url:"reqSuppr-participant.php",
					
					success: function(data)
						{
							contenuTab();
							enregistrementParticipant();
						

						}
				});
	});

}

function enregistrementParticipant(){
$('#appliPart').click(function(){
	
	 $("#box2View option").each(function () {
               $(this).attr('selected','selected');
        });
	$.ajax({
		type:"post",
		url:"reqAppli-participant.php",
		data : $('#form').serialize(),
		success: function(data)
		{
			$('#notif').show();
			$('#notif').empty();
			$('#notif').append(data);	
			$( "#popUpAffichage" ).removeClass('large').hide();
			$( "#popUpAffichage" ).empty();
			contenuTab();
			}
		});

	
});


}

function contenuTab(){
var choix = $('body').attr('id');
switch(choix){
	case 'forma': $('#indic').html("Liste des Formations");
			break;
	case 'perso': $('#indic').html("Liste du Personnel");
			break;
	case 'orga': $('#indic').html("Liste des Organisateurs");
			break;
	default: break;
}

		$.ajax({
			url:"liste-"+choix+".php",
					
					success: function(data)
						{
							
							$( "#tab" ).empty();
							$( "#tab" ).append(data);
							initTableau();
							boutonOuvrirFicheAjouter();
							ouvrirFicheModif();
							supprBdd();
							gestParticipant();
							supprParticipant();
						}
				});


}

function changeTab(){
	$('#choixTab').change(function() {
		var choix =$(this).val();
$('body').attr('id',choix);
	contenuTab();
	});

}
function initTableau(){
$('#tableau').dataTable({
			"bPaginate": false,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"sScrollY": "350px",
			"bJQueryUI": true,
			"bInfo": false,
			"bAutoWidth": false,
		});


}
$(function(){
$(".alert").alert('');
boutonOuvrirFicheAjouter();
$('#popUpAffichage').draggable();
changeTab();
ouvrirFicheModif()
initTableau();
supprBdd();
gestParticipant();
supprParticipant();

});

</script>
</head>
<body id="forma">
	<div class="global-nav navbar navbar-inverse">
              <div class="navbar-inner">
                <div class="container">
                  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <a class="brand" href="#">M2L | Gestion des formations</a>
                  <div class="nav-collapse">
                    <ul class="nav">
                      <li class="active"><a href="gestForma.php">Accueil</a></li>
                      <li><a href="../index.php">MRBS</a></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
                </div>
              </div><!-- /navbar-inner -->
            </div>

<div class="container">
<div class="mainBox">
	<h1>Votre espace de gestion des formations  </h1>
	<hr />
	<h2 id="indic">Liste des Formations</h2>   
		<select name="choixTab" id="choixTab">
			<option value="forma">Formations</option>
			<option value="perso">Personnel</option>
			<option value="orga">Organisteurs</option>
		</select>
	<br />
	<button id='ajout' class="btn btn-primary">Ajouter</button>
	<br /><br />
	<div id="notif"></div>
	<div id="tab">
	<?php
		include('liste-forma.php');

	?>

	</div>
</div>
<div id="popUpAffichage" style="display:none;" ></div>
</div>
</body>
</html>
