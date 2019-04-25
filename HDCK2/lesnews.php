
<?php 


$db=new mysqli("localhost","root","root","hbck");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
}

$req="select * from `news`";
$results= $db->query($req);

?>
<div class="container">
<table><?php while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) {
	if (isset($_COOKIE["hbck"]))
	{if ( ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2))
	{
	echo "<tr><td><a href='index.php?page=news&id=".$row['NewsId']." '>modifier</a></td><td>"." <a href='index.php?page=news&id=".$row['NewsId']." '>".$row['Titre']."</a>";
}

}else{
	echo "<tr><td></td><td>"." <a href='index.php?page=news&id=".$row['NewsId']." '>".$row['Titre']."</a>";
}

}
?></table>
<?php
if (isset( $_COOKIE["hbck"]))
	{if ($_COOKIE["hbck"]==1 | $_COOKIE["hbck"]==2){
echo "<br/><button><a href='index.php?page=news&id=new'> creer<a></button>";
	}
} 
?>
</div>

