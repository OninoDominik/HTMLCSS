<?php 
$db=new mysqli("localhost","root","root","hbck");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
} 
$req="select * from `news` where EquipeId is NULL order by DateN DESC limit 3;";
	$results= $db->query($req);

?>
<div class="container" >
	<div class="row ">
		<div class="col-md-9 " style="top: 20px;color:red ; height:300px;" >
			<?php 
			while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
			{
				$trunc=$row['Contenu'];
				$cellule= substr($row['Contenu'], 0, 300);
				echo "<a class='news2' href='index.php?page=news&id=".$row['NewsId']."'>"."<div class='col-md-4 news'>"."".$row['Titre']."<br/>".$cellule.'</div></a>' ; 
			} 
?> 
		</div>
		<div  class="col-md-1" style="top: 20px;color:red;height:300px; float:right">
		</div>
	<div  class="col-md-2" style=" top: 20px;color:white;height:300px; float: right; ">
		<div style="height:150px; float: right; border:1px solid white; background-color:#1C1A1B">
			<?php include('prochainmatch.php') ?>
		</div> 
		<div  style="height:150px; float: right; text-align: center ;  border:1px solid white; background-color:#1C1A1B">
			<?php include('dernierresultat.php') ?>
		</div> 
	</div>
		
	</div>
	<div class="row">
		<div class="col-md-9" style="top: 20px; color:yellow; height:300px;" >
			<?php 
			$req2="select * from `news`where EquipeId IS not NULL order by DateN DESC limit 3;";
			$results2= $db->query($req2);

			while ($row2 = mysqli_fetch_array($results2, MYSQLI_BOTH)) 
			{
							$trunc=$row2['Contenu'];
			$cellule= substr($row2['Contenu'], 0, 300);
				echo "<a href='index.php?page=news&id=".$row2['NewsId']."'>"."<div class='col-md-4 news'>"."".$row2['Titre']."<br/>".$cellule.'</div></a>' ; 
			} 
?> 

		</div>
		<div  class="col-md-1" style="top: 20px;color:red;height:300px; float:right">
		</div>
	<div  class="col-md-2" style="top: 20px;color:green;height:300px; float: right; ">
		<div style="height:150px; float: right;  border:1px solid white; background-color:#1C1A1B">
			
<script charset='UTF-8' src='http://www.meteofrance.com/mf3-rpc-portlet/rest/vignettepartenaire/681660/type/VILLE_FRANCE/size/PORTRAIT_VIGNETTE' type='text/javascript'></script>

		</div> 
		
	</div>
		
	</div>

</div>
