
<?php 


$db=new mysqli("localhost","root","root","tplicencie");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
}

$req="select * from `licencie`";
$results= $db->query($req);

?>
<div class="container">
<table class="table">
	<tr>
      <th scope="col">Lien modif</th>
      <th scope="col">Nom</th>
       <th scope="col">Lien suppr</th>

    </tr><?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {

	
	echo "<tr><td><a href='index.php?page=licencie&id=".$row['licenceId']." '> modifier</a></td><td>"." ".$row['nom']."</td> <td> supprimer</td>";
}


?></table>
<br/><button><a href='index.php?page=licencie&id=new'> creer<a></button>
</div>

