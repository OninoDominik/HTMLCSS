<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1><?php echo "testS"; ?></h1>
<?php 
$db=new mysqli("localhost","root","root","phpbdd");

$req="select * from `licencie`";
$results= $db->query($req);

?>
<table><?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
	echo "<tr><td><a href='form.php?id=".$row['id_licencie']." '>modifier</a></td><td>".$row['nom']." </td><td>".$row['prenom']." </td><td>".$row['n_licence']."</td></tr>";
} ?></table>
<button><a href='form.php?id=new'> creer<a></button>
</body>
</html>
