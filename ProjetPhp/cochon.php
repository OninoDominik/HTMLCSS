<?php 
$db=new mysqli("localhost","root","root","projetCochon");

$obj_database=new Database();
if ($_GET['id']=='new')
{
	if (isset($_POST['validerNews']))
	{ 
		$creer = "insert into cochon (Nom, Poids, Heure_naissance,  Url_img, Sexe) values ('".$_POST['Nom']."','".$_POST['Poids']."','".$_POST['Heure_naissance']."', 'cochon.jpeg','".$_POST['Sexe']."')";
		$obj_database->Query($creer);
		echo $creer;
		/* echo "<script>location.href='index.php?page=liste_cochon';</script>";*/
	}
}
else 
{
	if(isset($_POST['validerNews']))
	{
		$mettreajour="UPDATE cochon set  Nom='".$_POST['Nom']."', Heure_naissance='".$_POST['Heure_naissance']."', Sexe='".$_POST['Sexe']."', Poids='".$_POST['Poids']."' where id_cochons='".$_GET['id']."';";
		
		echo $_POST['Heure_naissance'];
		$obj_database->Query($mettreajour);
	}

	$req="select Nom,Sexe, Poids,Heure_naissance,DATE_FORMAT(Heure_naissance, '%d/%m/%Y %Hh%imin') AS date from `cochon` where id_cochons=".$_GET['id'].";";
	
	$news= $obj_database->Query($req);
}
if (isset($_POST['envoyer']))
{ 
	
}
if (isset($_POST['SupprimerNews']))
{
	$suppr="DELETE FROM cochon where id_cochons=".$_GET['id'].";";
	$obj_database->Query($suppr);
	echo "<script>location.href='index.php?page=liste_cochon';</script>";
}


?>
<div class="container">
<img src="cochon.jpeg" id="imgHBCKLogo">
	<form action="" method="POST">
		<div class="row form-group">
			<div class="col-md-12">
				<?php
				if ($_GET['id'] !='new')
				{
			$data = $news[0]['Heure_naissance'];
			$dbInsertDate = date('d-m-Y H:i:s', strtotime($data));
			$dbInsertDate2 = date('Y-m-dTH:i', strtotime($data));
			$dbInsertDate3 = date('Y-m-d', strtotime($data));
			$dbInsertDate4 = date('H:i', strtotime($data));
			$stringdatetimelocal= $dbInsertDate3."T".$dbInsertDate4;
				}

				?>
				<div class="col-md-2">
					
				 <label for="formGroupExampleInput">Nom :</label>
				</div>
				<div class="col-md-4">
					<input type="text" class ='form-control' style="min-width: 400px;min-height: auto" name='Nom' value='<?php if ($_GET['id']!='new') echo $news[0]['Nom']; ?>'><br/>
				</div>
				<div class="col-md-2">
					 <label for="formGroupExampleInput">Numero de licence :</label>
					</div>
					<div class="col-md-4">
						<input type="number" class ='form-control' style="min-width: 400px;min-height: auto" name='Poids' value='<?php if ($_GET['id']!='new') echo $news[0]['Poids']; ?>'><br/>
					</div>

				<div class="col-md-2">
				<label for="formGroupExampleInput"><?php  echo "Date et Heure de naissance"."<br/>" ;?></label>
				</div>
				<div class="col-md-4">
					<input type="datetime-local" class ='form-control' style="min-width: 400px;min-height: auto;" name='Heure_naissance' id="Heure_naissance" value='<?php  if ($_GET['id']!='new') echo $stringdatetimelocal; ?>'><br/>
					<input type="hidden" name='id_cochons' value='<?php  echo $_GET['id']; ?>' >
				</div>
			</div>
			<div class="col-md-12">
				<div class="col-md-2">

				</div>
				<div class="col-md-4">
					<?php


					echo 'Sexe :' ;
					echo '<select type="text" name="Sexe" id="Sexe" style="min-width: 400px;min-height: auto" class ="form-control" ><br/>';



					if ($_GET['id']=='new')
{
						echo "<option selected value=1 > Male </option>";
						echo "<option  value=0> Femelle </option>";
					}
					else
					{
						$req2="select * from `cochon` where id_cochons=".$_GET['id']."";
						$results2= $obj_database->Query($req2);
						foreach($results2 as $row2) 
						{
							if ($row2['Sexe']=='1' )
							{
								echo "<option selected value=1 > Male </option>";
								echo "<option  value=0> Femelle </option>";
							}
							else
							{
								echo "<option  value=1 > Male </option>";
								echo "<option selected value=0> Femelle </option>";
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

				echo'</form></form><br/><button><a href="index.php?page=liste_cochon">Retour</a></button><br/> ';
				echo '<button type="submit" name="SupprimerNews">Supprimer</button> ';
				?>
				</div></div></div></div>
