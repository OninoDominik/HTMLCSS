<?php 
$db=new mysqli("localhost","root","root","phpbdd");
if ($_GET['id']=='new')
{
	if (isset($_POST['valider']))
	{ 
		$creer = "INSERT INTO licencie (sexe, nom, prenom, n_licence)VALUES ('".$_POST['sexe']."', '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['nlicence']."');";
		$db->query($creer);
	}
}
else 
{
	if(isset($_POST['valider']))
	{
		$mettreajour="UPDATE licencie set prenom='".$_POST['prenom']."', nom='".$_POST['nom']."', n_licence='".$_POST['nlicence']."' , sexe='".$_POST['sexe']."' where id_licencie=".$_GET['id'].";";
		$db->query($mettreajour);
	}

	$req="select * from `licencie` where id_licencie=".$_GET['id'].";";
	$results= $db->query($req);
	$licencie= mysqli_fetch_array($results, MYSQLI_BOTH);
}
if (isset($_POST['envoyer']))
{ 
 move_uploaded_file($_FILES['photoss']['tmp_name'],"photo222.jpg"); //photo.jpg =nomage et destination
}
?>

<form action="" method="POST">
	Prénom: <input type="text" name='prenom' value='<?php if ($_GET['id']!='new') echo $licencie['prenom']; ?>'><br/>
	Nom: <input type="text" name='nom' value='<?php  if ($_GET['id']!='new') echo $licencie['nom']; ?>'><br/>
	N°licence: <input type="text" name='nlicence' value='<?php if ($_GET['id']!='new') echo $licencie['n_licence']; ?>'><br/>
	<input type="hidden" name='id_licencie' value='<?php  echo $_GET['id']; ?>'>
	Sexe:  
	<select name="sexe">
		<option value="femme" <?php 
		if (($_GET['id']!='new') && $licencie['sexe']=='femme')
			{echo " selected ";} 
		?>
		>
		Femme
	</option> 
	<option value="homme"  
	<?php 
	if (($_GET['id']!='new')&& $licencie['sexe']=='homme')
		{echo " selected ";} 
	?> 
	>
	Homme
</option>
</select><br/>
<button type="submit" name="valider">Enregistrer</button>
</form>

<form action="" method="POST" enctype="multipart/form-data">
	Photos: <input type="file" name="photoss">
	<button type="submit" name="envoyer">Enregistrer</button>
</form>
<a href="liste.php">Retour</a>