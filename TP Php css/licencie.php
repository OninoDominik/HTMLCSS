<?php 
$db=new mysqli("localhost","root","root","tplicencie");
if (!mysqli_set_charset($db, "utf8")) {
	printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
	exit();
} else {
}
if ($_GET['id']=='new')
{
	if (isset($_POST['validerNews']))
	{ 
		$creer = "insert into licencie (nom, prenom, sexe, numLicence) values ('".$_POST['nom']."','".$_POST['prenom']."',".$_POST['sexe'].",'".$_POST['numLicence']."')";
		$db->query($creer);
		 echo "<script>location.href='index.php?page=Liste';</script>";
	}
}
else 
{
	if(isset($_POST['validerNews']))
	{
		$mettreajour="UPDATE licencie set  nom='".$_POST['nom']."', prenom='".$_POST['prenom']."', sexe='".$_POST['sexe']."', numLicence='".$_POST['numLicence']."' where licenceId='".$_GET['id']."';";
		
		$db->query($mettreajour);
	}

	$req="select * from `licencie` where licenceId=".$_GET['id'].";";
	$results= $db->query($req);
	$news= mysqli_fetch_array($results, MYSQLI_BOTH);
}
if (isset($_POST['envoyer']))
{ 
	
}
if (isset($_POST['SupprimerNews']))
{
	$suppr="DELETE FROM licencie where licenceId=".$_GET['id'].";";
	$db->query($suppr);
	echo "<script>location.href='index.php?page=liste';</script>";
}

?>
<div class="container">
	<form action="" method="POST">
		<div class="row form-group">
			<div class="col-md-12">
				<?php
				if ($_GET['id']!='new') 
				{
					$reqExt="select * from licencie where licenceId=".$_GET['id'];
					$resultExt= $db->query($reqExt);
					$rowExt = mysqli_fetch_array($resultExt, MYSQLI_BOTH);
				}
				?>
				<div class="col-md-2">
					
				 <label for="formGroupExampleInput">Nom:</label>
				</div>
				<div class="col-md-9">
					<input type="text" class ='form-control' style="min-width: 400px;min-height: auto" name='nom' value='<?php if ($_GET['id']!='new') echo $news['nom']; ?>'><br/>
				</div>
				<div class="col-md-2">
					 <label for="formGroupExampleInput">Numero de licence</label>
					</div>
					<div class="col-md-9">
						<input type="number" class ='form-control' style="min-width: 400px;min-height: auto" name='numLicence' value='<?php if ($_GET['id']!='new') echo $news['numLicence']; ?>'><br/>
					</div>

				<div class="col-md-2">
				<label for="formGroupExampleInput">Prénom :</label>
				</div>
				<div class="col-md-9">
					<input type="text" class ='form-control' style="min-width: 400px;min-height: auto;" 
					rows="4" cols="110"   name='prenom' id="prenom" value='<?php  if ($_GET['id']!='new') echo $news['prenom']; ?>'><br/>
					<input type="hidden" name='licenceId' value='<?php  echo $_GET['id']; ?>' >
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-1">

				</div>
				<div class="col-md-9">
					<?php


					echo 'Sexe' ;
					echo '<select type="text" name="sexe" id="sexe"  class ="form-control" ><br/>';



					if ($_GET['id']=='new')
{
						echo "<option selected value=1 > Homme </option>";
						echo "<option  value=0> Femme </option>";
					}
					else
					{
						$req2="select * from `licencie` where licenceId=".$_GET['id']."";
						$results2= $db->query($req2);
						while ($row2 = mysqli_fetch_array($results2, MYSQLI_BOTH)) 
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

				echo'</form></form><br/><button><a href="index.php?page=Liste">Retour</a></button><br/> ';
				echo '<button type="submit" name="SupprimerNews">Supprimer</button> </div></div>';


				?>
