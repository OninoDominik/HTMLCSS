<?php 
$db=new mysqli("localhost","root","root","hbck");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
}
if ($_GET['id']=='new')
{
	if (isset($_POST['validerNews']))
	{ 
		$creer = "insert into news (Titre, Contenu, DateN, EquipeId) values ('".$_POST['Titre']."','".$_POST['Contenu']."',now(),".$_POST['EquipeId'].")";
		$db->query($creer);
		 echo "<script>location.href='index.php?page=lesnews';</script>";
	}
}
else 
{
	if(isset($_POST['validerNews']))
	{
		$mettreajour="UPDATE news set DateN=now(), Titre='".$_POST['Titre']."', Contenu='".$_POST['Contenu']."', EquipeId=".$_POST['EquipeId']." where NewsId=".$_GET['id'].";";
		$db->query($mettreajour);
	}

	$req="select * from `news` where NewsId=".$_GET['id'].";";
	$results= $db->query($req);
	$news= mysqli_fetch_array($results, MYSQLI_BOTH);
}
if (isset($_POST['envoyer']))
{ 
	if ($_GET['id']!='new')
	{
 move_uploaded_file($_FILES['photoss']['tmp_name'],"".$_GET['id'].".jpg");
$mettreajour="UPDATE news set Photo='".$_GET['id'].".jpg"."' where NewsId=".$_GET['id'].";";
		$db->query($mettreajour);
 } //photo.jpg =nomage et destination
}
if (isset($_POST['SupprimerNews']))
{
	$suppr="DELETE FROM news where NewsId=".$_GET['id'].";";
		$db->query($suppr);
		 echo "<script>location.href='index.php?page=lesnews';</script>";
}

?>
<div class="container">
<form action="" method="POST">
	<div class="row">
	<div class="col-md-12">
		<?php

		if ($_GET['id']!='new') 
		{
			$reqExt="select * from news where NewsId=".$_GET['id'];
			$resultExt= $db->query($reqExt);
			$rowExt = mysqli_fetch_array($resultExt, MYSQLI_BOTH);
			echo "<img src=".$rowExt['Photo'].">";
		}
		?>
	<div class="col-md-1">

	Titre: 
</div>
<div class="col-md-9">
	<input type="text" style="min-width: 400px;min-height: auto" name='Titre' value='<?php if ($_GET['id']!='new') echo $news['Titre']; ?>'><br/>
</div>
	<div class="col-md-1">
	Contenu: 
</div>
<div class="col-md-9">
	<textarea style="min-height: 600px; width: : 80%;" 
	rows="4" cols="110"   name='Contenu' id="Contenu" value='<?php  if ($_GET['id']!='new') echo $news['Contenu']; ?>'><?php  if ($_GET['id']!='new') echo $news['Contenu']; ?> </textarea><br/>
	<input type="hidden" name='NewsId' value='<?php  echo $_GET['id']; ?>' >
</div>
</div>
<div class="col-md-12">
	<div class="col-md-1">
	
</div>
<div class="col-md-9">
	<?php

			if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
		echo 'Equipe' ;
	echo '<select type="text" name="EquipeId" id="EquipeId" ><br/>';
			echo "<option  value=NULL>Concerne tout le club</option>";
$req2="select * from `equipe` where EquipeId>0 and EquipeId<12 ";
	$results2= $db->query($req2);
while ($row2 = mysqli_fetch_array($results2, MYSQLI_BOTH)) 
{
	echo "test".$news['EquipeId'];

	if ($row2['EquipeId']==$news['EquipeId'])
	{

		echo "<option selected value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
	else
	{
		echo "<option value=".$row2['EquipeId'].">".$row2['NomEquipe']."</option>";
	}
}
}}

	?>
	
</select>

<?php
			if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
echo '<button type="submit" name="validerNews">Valider</button>';
}
}
?>
	
</form>
<?php
			if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
if ($_GET['id']!='new')
{
echo'<form action="" method="POST" enctype="multipart/form-data">';
echo'	Photos: <input type="file" name="photoss">';
echo'	<button type="submit" name="envoyer">Enregistrer</button>';
echo'	<form action="upload.php" method="post" name="import_fichier" enctype="multipart/form-data"/>';
echo'</form></form><a href="index.php?page=accueil">Retour</a></div> </div>';
}
if ($_COOKIE["hbck"]==1)
{
	echo '<button type="submit" name="SupprimerNews">Supprimer</button>';
}
}
}

?>
