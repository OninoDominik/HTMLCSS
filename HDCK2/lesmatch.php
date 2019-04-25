<?php 


$db=new mysqli("localhost","root","root","hbck");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
}

$requ="select * from `agenda` ";
$resultsagenda= $db->query($requ);

?>
<div class="container">
<table><?php while ($row = mysqli_fetch_array($resultsagenda, MYSQLI_BOTH)) { ;
	if (isset($_COOKIE["hbck"]))
	{if ( ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2))
	{
$reqDom="select NomEquipe from Equipe where EquipeId=".$row['EquipeIdDomicile'];
$resultDom= $db->query($reqDom);
$rowDom = mysqli_fetch_array($resultDom, MYSQLI_BOTH);
$reqExt="select NomEquipe from Equipe where EquipeId=".$row['EquipeIdExterieur'];
$resultExt= $db->query($reqExt);
$rowExt = mysqli_fetch_array($resultExt, MYSQLI_BOTH);

	echo "<tr><td><a href='index.php?page=match&id=".$row['AgendaId']." '>modifier</a></td><td>"." <a href='index.php?page=match&id=".$row['AgendaId']." '>".$rowDom['NomEquipe']." contre ".$rowExt['NomEquipe'].": ".$row['ScoreDomicile']."  ".$row['ScoreExterieur']." ".$row['DateM']."</a>";
}

}else{
$reqDom="select NomEquipe from Equipe where EquipeId=".$row['EquipeIdDomicile'];
$resultDom= $db->query($reqDom);
$rowDom = mysqli_fetch_array($resultDom, MYSQLI_BOTH);
$reqExt="select NomEquipe from Equipe where EquipeId=".$row['EquipeIdExterieur'];
$resultExt= $db->query($reqExt);
$rowExt = mysqli_fetch_array($resultExt, MYSQLI_BOTH);
	echo "<tr><td></td><td> <a href='index.php?page=match&id=".$row['AgendaId']." '>".$rowDom['NomEquipe']." contre ".$rowExt['NomEquipe'].": ".$row['ScoreDomicile']."  ".$row['ScoreExterieur']." ".$row['DateM']."</a>";
}

}
?></table>
<?php
if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
echo "<br/><button><a href='index.php?page=match&id=new'> creer <a></button>";
	}
} 
?>
</div>