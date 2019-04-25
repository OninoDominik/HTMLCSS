<?php

$db = new mysqli('127.0.0.1:3306', 'root', 'root','hbck');
if (!$db) {die('Connexion impossible : ' . mysql_error());}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$datenaissance = $_POST['datenaissance'];
$adresse = $_POST['adresse'];
$cpostal = $_POST['cpostal'];
$ville = $_POST['ville'];
$numtel = $_POST['numtel'];
$email = $_POST['email'];
$tel = $_POST['numtel'];
$licence= $_POST['licencie'];
$club = $_POST['club'];

// Test les checkboxs
//Si la variable $_POST['benevole'] existe, alors $benevole = $_POST['benvole']  sinon elle vaut NULL 
$benevole = isset($_POST['benevole']) ? $_POST['benevole'] : 0;
if ($_POST['benevole'] == "benevole")
{
	$benevole = 1;
}
else
{
	$benevole = 0;
}
if (isset($_POST['joueuse'])) {;
if ($_POST['joueuse'] == "joueuse")
{
	$joueuse = 1;
}
}
else
{
	$joueuse = 0;
}
if (isset($_POST['entraineur'])) {
if ($_POST['entraineur'] == "entraineur")
{
	$entraineur = 1;
}
}
else
{
	$entraineur = 0;
}
if (isset($_POST['licencie'])) {
if ($_POST['licencie'] == "1")
{
	$licence = 1;
}
}
else
{
	$licence = 0;
	$club == "NULL" ;
}


//vérification des champs de saisie



$sql = "INSERT INTO `hbck`.`preinscription` (`Nom`, `Prenom`, `Datenaissance`, `Adresse`, `CodePostal`, `Ville`, `Email` , `Tel`, `Licence`, `Arbitre`, `Joueuse`, `Benevole`, `Club`) VALUES ('".$nom."','".$prenom."','".$datenaissance."','".$adresse."', '".$cpostal."', '".$ville."', '".$email."','".$numtel."','".$licence."','".$entraineur."','".$joueuse."','".$benevole."','".$club."');";

if ($db->query($sql) == true) {
	echo "Demande enregistrée.";
	$db->close();
	echo "<script> location.href='index.php?page=accueil' </script>";
} else {
	echo "Erreur: " . $sql . "<br>" . $db->error;
	$db->close();
}



?>
