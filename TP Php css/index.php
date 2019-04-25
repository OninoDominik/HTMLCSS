<!DOCTYPE html>

<?php 
	include ("connexionPDO.php");



       ?>         

<?php 

if(!isset($_GET['page']))
{
	$_GET['page']="Liste";
}
else if ($_GET['page'] == "")
{
	$_GET['page']="Liste";
}

switch($_GET['page'])
{
case "Liste":
$title = "Liste licencie";
break;

case "Licencie":
$title = "Page d'un licencie'";
break;


default:
$title = "Tp";

}

?>
<html lang="fr">

  <head>

    <meta Content-type:"text/html" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title><?php echo $title ?></title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link href="style.css"  rel="stylesheet" media="all" type="text/css">
    <!-- Custom styles for this template -->
  </head>

<body style='background-color: white'>
	
	<header id="header2" >
		<?php
		include("header2.php");
		?>
</header>


	<div id="content">
		<!-- affichage de la variable en parametre-->
		<!-- le paramettre est stocke dans un tableau $_GET-->
		<!-- si le tableau est vide message d'erreur -->
		<br/> <br/>

		<?php 
		//  . = symbole de concatenation
		include($_GET['page'].'.php'); 
		?>
	</div>

<footer id="footer12">
	<?php
		include("footer3.php");
	?>
</footer>


</body>

</html>