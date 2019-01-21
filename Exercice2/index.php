<!DOCTYPE html>
<!-- mettre les fichier dans les fichier dans un dossier exo dans www sous laragon-->
<!-- truc : Pour sublime text 3 : alt + shift + f pour auto indenter ajouter {"keys": ["alt+shift+f"], "command": "reindent", "args": {"single_line": false}}  à preference/key bindings -->

<!-- initialisation du tableau $_GET[a l'indice 'page'] afin de ap avoir de message d'erreur au lancement de la page si il n'y a aps de paramettre-->
<!-- isset = test si le paramettre existe , donc ! devant pour tester si elle existe pas -->
<?php 

if(!isset($_GET['page']))
{
	$_GET['page']="acceuil";
}
else if ($_GET['page'] == "")
{
	$_GET['page']="acceuil";
}
/* swtich reveient a cela :-->
if ($_GET['page'] == "acceuil")
{
	$title ="Page d'acceuil";
}
if ($_GET['page'] == "news")
{
	$title ="Page des News";
}
if ($_GET['page'] == "contact")
	$title ="Informations de contact";
}

*/
switch($_GET['page'])
{
case "acceuil":
$title = "Page d'acceuil";
break;

case "news":
$title = "Page des News";
break;

case "contact":
$title = "Informations de contact";
break;

default:
$title = "Mon Site";

}

?>

<html lang="fr">
<head>
	<!-- truc a mettre qui n'a pas vraiment été défini-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title> <?php echo $title ?> </title>
	<!-- appel des feuille de style-->
	<link href="style.css" rel="stylesheet" media="all" type="text/css">
</head>
<body>
	
	<!-- appel de header.php-->
	<div id="header">
		<?php 
		include('header.php'); 
		?>
	</div>
	<!-- appel du acceuil.php-->
	<div id="content">
		<!-- affichage de la variable en parametre-->
		<!-- le paramettre est stocke dans un tableau $_GET-->
		<!-- si le tableau est vide message d'erreur -->
		valeur du parametre :<?php echo $_GET['page']?>
		<br/> <br/>

		<?php 
		//  . = symbole de concatenation
		include($_GET['page'].'.php'); 
		?>
	</div>

	<!-- appel de footer.php-->
	<div id="footer">
		<?php 
		include('footer.php'); 
		?>
	</div>

</body>
</html>