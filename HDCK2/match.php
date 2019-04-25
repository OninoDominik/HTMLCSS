<?php 
$db=new mysqli("localhost","root","root","hbck");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
}
if ($_GET['id']=='new')
{
	if (isset($_POST['validerMatch']))
	{ 
		$creer = "INSERT INTO agenda (ScoreDomicile, ScoreExterieur, DateM, EquipeIdDomicile,EquipeIdExterieur) values ('".$_POST['ScoreDomicile']."','".$_POST['ScoreExterieur']."','".$_POST['DateM']."','".$_POST['EquipeIdExterieur']."','".$_POST['EquipeIdDomicile']."')";
		$db->query($creer);
	}
}
else 
{
	if(isset($_POST['validerMatch']))
	{
		$mettreajour="UPDATE agenda set DateM='".$_POST['DateM']."', ScoreExterieur='".$_POST['ScoreExterieur']."', ScoreDomicile='".$_POST['ScoreDomicile']."', EquipeIdExterieur='".$_POST['EquipeIdExterieur']."', EquipeIdDomicile=".$_POST['EquipeIdDomicile']." where AgendaId=".$_GET['id'].";";
		$db->query($mettreajour);
	}

	$req="select * from `news` where NewsId=".$_GET['id'].";";
	$results= $db->query($req);
	$news= mysqli_fetch_array($results, MYSQLI_BOTH);
}

?>
<div class="container">
<form action="" method="POST">
	<div class="row">
	<div class="col-md-12">
	<div class="col-md-1"> 
</div>
<div class="col-md-9">
</div>
<div class="col-md-12">
	<div class="col-md-1">
		<input type="hidden" name='AgendaId' value='<?php  echo $_GET['id']; ?>' >
</div>
<div class="col-md-9">
	<?php

$req4="select * from equipe";
$results4= $db->query($req4);
if ($_GET['id']!='new')
	{
$reqAgenda="select * from agenda where AgendaId=".$_GET['id'];
$resultatAgenda=$db->query($reqAgenda);
$agenda = mysqli_fetch_array($resultatAgenda, MYSQLI_BOTH);
}
echo 'Equipe a Domicile' ;
echo '<select type="text" name="EquipeIdDomicile" id="EquipeIdDomicile" ><br/>';;

while ($row2 = mysqli_fetch_array($results4, MYSQLI_BOTH)) 
{
	
echo $agenda['EquipeIdDomicile'];

	if ($row2['EquipeId']==$agenda['EquipeIdDomicile'])
	{

		echo "<option selected value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
	else
	{
		echo "<option value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
}


	?>
	
</select>
<br/>Score : <input type="number" name="ScoreDomicile" id="ScoreDomicile"   value='<?php  if ($_GET['id']!='new') echo $agenda['ScoreDomicile']; ?>'  >
	<br/>
<?php
echo 'Equipe a externe' ;
echo '<select type="text" name="EquipeIdExterieur" id="EquipeIdExterieur" ><br/>';;
$req2="select * from `equipe`";
$results2= $db->query($req2);
while ($row2 = mysqli_fetch_array($results2, MYSQLI_BOTH)) 
{

	if ($row2['EquipeId']==$agenda['EquipeIdExterieur'])
	{

		echo "<option selected value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
	else
	{
		echo "<option value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
}


	?>
	
</select>
<br/>Score : <input type="number" name="ScoreExterieur" id="ScoreExterieur" value='<?php  if ($_GET['id']!='new') echo $agenda['ScoreExterieur']; ?>'  >
<br/>

 Date <input type="Date" class="form-control" id="DateM" name = "DateM" value='<?php  if ($_GET['id']!='new') echo $agenda['DateM']; ?>''><br/><br/>

<?php
			if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
echo '<button type="submit" name="validerMatch">Valider</button>';
}
}
?>
	
</form>
<?php
			if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
echo'</form></form><a href="index.php?page=accueil">Retour</a></div> </div>';
}
}
?>
</div>
</div>

