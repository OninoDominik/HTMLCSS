<?php


$obj_database = new Database();
if ($_GET['id'] == 'new') {
	if (isset($_POST['validerNews'])) {
		$creer = "insert into cochon (Nom, Poids, Heure_naissance,  Url_img, Sexe) values ('" . $_POST['Nom'] . "','" . $_POST['Poids'] . "','" . $_POST['Heure_naissance'] . "', 'cochon.jpeg','" . $_POST['Sexe'] . "')";
		$obj_database->Query($creer);
		echo "<script>location.href='index.php?page=liste_cochon';</script>";
	}
} else {
	if (isset($_POST['validerNews'])) {
		$mettreajour = "UPDATE cochon set  Nom='" . $_POST['Nom'] . "', Heure_naissance='" . $_POST['Heure_naissance'] . "', Sexe='" . $_POST['Sexe'] . "', Poids='" . $_POST['Poids'] . "' where id_cochons='" . $_GET['id'] . "';";
		$obj_database->Query($mettreajour);
	}
	
	$req = "select Nom,Sexe, Poids,Url_img,Heure_naissance,Heure_mort,DATE_FORMAT(Heure_naissance, '%d/%m/%Y %Hh%imin') AS date from `cochon` where id_cochons=" . $_GET['id'] . ";";
	
	$news = $obj_database->Query($req);
}
if (isset($_POST['envoyer'])) { }
if (isset($_POST['SupprimerNews'])) {
	$suppr = "DELETE FROM cochon where id_cochons=" . $_GET['id'] . ";";
	$obj_database->Query($suppr);
	echo "<script>location.href='index.php?page=liste_cochon';</script>";
}


?>
<div class="container">
<form action="" method="POST">
<div class="row form-group">
<div class="col-md-12">
<?php
if ($_GET['id'] != 'new') {
	$data = $news[0]['Heure_naissance'];
	$dbInsertDate = date('d-m-Y H:i:s', strtotime($data));
	$dbInsertDate2 = date('Y-m-dTH:i', strtotime($data));
	$dbInsertDate3 = date('Y-m-d', strtotime($data));
	$dbInsertDate4 = date('H:i', strtotime($data));
	$stringdatetimelocal = $dbInsertDate3 . "T" . $dbInsertDate4;
	echo "<img src=./ressource/image/" . $news[0]['Url_img'] . ' id="cochon">';
	if (isset($news[0]['Heure_mort']))
	{
		$Dureedevie=strtotime($news[0]['Heure_mort'])-strtotime($news[0]['Heure_naissance']);
		$Dureedevie=$Dureedevie/(60*60*24*365);
		$Dureedevie=number_format($Dureedevie,1);
		$stringDuréedeVie = "le cochon est mort à l'âge de ".$Dureedevie." ans";
	}
	else
	{
		$Dureedevie=strtotime("now")-strtotime($news[0]['Heure_naissance']);
		$Dureedevie=$Dureedevie/(60*60*24*365);
		$Dureedevie=number_format($Dureedevie,1);
		$stringDuréedeVie = "Son âge :".$Dureedevie." ans";
	}
	echo $stringDuréedeVie;
	
}
?>
<div class="col-md-2">

<label for="formGroupExampleInput">Nom :</label>
</div>
<div class="col-md-4">
<input type="text" class='form-control' style="min-width: 400px;min-height: auto" name='Nom' value='<?php if ($_GET['id'] != 'new') echo $news[0]['Nom']; ?>'><br />
</div>
<div class="col-md-2">
<label for="formGroupExampleInput">Poids :</label>
</div>
<div class="col-md-4">
<input type="number" class='form-control' style="min-width: 400px;min-height: auto" name='Poids' value='<?php if ($_GET['id'] != 'new') echo $news[0]['Poids']; ?>'><br />
</div>

<div class="col-md-2">
<label for="formGroupExampleInput"><?php echo "Date et Heure de naissance" . "<br/>"; ?></label>
</div>
<div class="col-md-4">
<input type="datetime-local" class='form-control' style="min-width: 400px;min-height: auto;" name='Heure_naissance' id="Heure_naissance" value='<?php if ($_GET['id'] != 'new') echo $stringdatetimelocal; ?>'><br />
<input type="hidden" name='id_cochons' value='<?php echo $_GET['id']; ?>'>
</div>
</div>
<div class="col-md-12">
<div class="col-md-2">

</div>
<div class="col-md-4">
<?php


echo 'Sexe :';
echo '<select type="text" name="Sexe" id="Sexe" style="min-width: 400px;min-height: auto" class ="form-control" ><br/>';



if ($_GET['id'] == 'new') {
	echo "<option selected value=1 > Male </option>";
	echo "<option  value=0> Femelle </option>";
} else {
	$req2 = "select * from `cochon` where id_cochons=" . $_GET['id'] . "";
	$results2 = $obj_database->Query($req2);
	foreach ($results2 as $row2) {
		if ($row2['Sexe'] == '1') {
			echo "<option selected value=1 > Male </option>";
			echo "<option  value=0> Femelle </option>";
		} else {
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

echo '</form></form><br/><button><a href="index.php?page=liste_cochon">Retour</a></button><br/> ';
if ($_GET['id'] != 'new')
{ 
	echo '<button type="submit" name="SupprimerNews">Supprimer</button> '; 
}
?>
</div>
</div>
</div>
</div>