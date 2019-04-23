<?php 
$db=new mysqli("localhost","root","root","tplicencie");

$obj_database=new Database();
if ($_GET['id']=='new')
{
	if (isset($_POST['validerNews']))
	{ 
		$creer = "insert into licencie (nom, prenom, sexe, numLicence) values ('".$_POST['nom']."','".$_POST['prenom']."',".$_POST['sexe'].",'".$_POST['numLicence']."')";
		$obj_database->Query($creer);
		 echo "<script>location.href='index.php?page=liste_licencie';</script>";
	}
}
else 
{
	if(isset($_POST['validerNews']))
	{
		$mettreajour="UPDATE licencie set  nom='".$_POST['nom']."', prenom='".$_POST['prenom']."', sexe='".$_POST['sexe']."', numLicence='".$_POST['numLicence']."' where licencieId='".$_GET['id']."';";
		
		$obj_database->Query($mettreajour);
	}

	$req="select * from `licencie` where licencieId=".$_GET['id'].";";
	
	$news= $obj_database->Query($req);
}
if (isset($_POST['envoyer']))
{ 
	
}
if (isset($_POST['SupprimerNews']))
{
	$suppr="DELETE FROM licencie where licencieId=".$_GET['id'].";";
	$obj_database->Query($suppr);
	echo "<script>location.href='index.php?page=liste_licencie';</script>";
}

?>
<div class="container">
	<form action="" method="POST">
		<div class="row form-group">
			<div class="col-md-12">
				<?php
			
				?>
				<div class="col-md-2">
					
				 <label for="formGroupExampleInput">Nom :</label>
				</div>
				<div class="col-md-4">
					<input type="text" class ='form-control' style="min-width: 400px;min-height: auto" name='nom' value='<?php if ($_GET['id']!='new') echo $news[0]['nom']; ?>'><br/>
				</div>
				<div class="col-md-2">
					 <label for="formGroupExampleInput">Numero de licence :</label>
					</div>
					<div class="col-md-4">
						<input type="number" class ='form-control' style="min-width: 400px;min-height: auto" name='numLicence' value='<?php if ($_GET['id']!='new') echo $news[0]['numLicence']; ?>'><br/>
					</div>

				<div class="col-md-2">
				<label for="formGroupExampleInput">Prénom :</label>
				</div>
				<div class="col-md-4">
					<input type="text" class ='form-control' style="min-width: 400px;min-height: auto;" 
					rows="4" cols="110"   name='prenom' id="prenom" value='<?php  if ($_GET['id']!='new') echo $news[0]['prenom']; ?>'><br/>
					<input type="hidden" name='licencieId' value='<?php  echo $_GET['id']; ?>' >
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-2">

				</div>
				<div class="col-md-4">
					<?php


					echo 'Sexe :' ;
					echo '<select type="text" name="sexe" id="sexe" style="min-width: 400px;min-height: auto" class ="form-control" ><br/>';



					if ($_GET['id']=='new')
{
						echo "<option selected value=1 > Homme </option>";
						echo "<option  value=0> Femme </option>";
					}
					else
					{
						$req2="select * from `licencie` where licencieId=".$_GET['id']."";
						$results2= $obj_database->Query($req2);
						foreach($results2 as $row2) 
						{
							if ($row2['sexe']=='1' )
							{
								echo "<option selected value=1 > Homme </option>";
								echo "<option  value=0> Femme </option>";
							}
							else
							{
								echo "<option  value=1 > Homme </option>";
								echo "<option selected value=0> Femme </option>";
							}
						}
					}
					echo "</select>";
					?>



					<?php
					echo '<br/><button type="submit" name="validerNews">Valider</button>';

					?>



				</form>
				<?php

				echo'</form></form><br/><button><a href="index.php?page=liste_licencie">Retour</a></button><br/> ';
				echo '<button type="submit" name="SupprimerNews">Supprimer</button> ';


				?>
				</div></div></div></div>
