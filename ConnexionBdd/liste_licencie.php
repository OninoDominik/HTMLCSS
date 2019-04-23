<?php
include_once('ConnexionBDD.php');
error_reporting(0) ;
$hote="localhost";
$user="root";
$mdp="root";
$base="tplicencie";

$obj_database=new Database();
$req = "SELECT * FROM licencie";
$results = $obj_database->Query($req);
?>
<div class="container">
	<table class="tablesorter-blue" id='tbl_licencies'>
		<thead>
			<tr>
				<th scope="col">Lien modif</th>
				<th scope="col">Nom</th>
				<th scope="col">Numéro de Licence</th>
				<th  scope="col">Suppression</th>
			</tr>
		</thead>
		<tbody>
			<?php
			for( $i=0; $i<count($results);$i++){
				echo "<tr>
				<td><a href='index.php?page=licencie&id=".$results[$i]['licencieId']."'>modifier</a></td>
				<td>".$results[$i]['nom']." ".$results[$i]['prenom']."</td>
				<td>".$results[$i]['numLicence']."</td><td><a href='index.php?page=suppr&id=".$results[$i]['licencieId']."'><img src='trash.png' id='imgHBCKLogo'><a></td>
				</tr> ";
			}
			?>

		</table>
		<tbody>
			<br/><button><a href='index.php?page=licencie&id=new'> creer<a></button></div>

				<script>
					$(function() {
						$("#tbl_licencies").tablesorter({theme: 'blue'});

					});
				</script>