<?php 
$db=new mysqli("localhost","root","root","projetwb");
if (!mysqli_set_charset($db, "utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($db));
    exit();
} else {
} 
$req="select * from `news` limit 6;";
	$results= $db->query($req);
?>
<div class="container" >
	<div class="row">
		<div class="col-md-9" style="top: 20px; color:green; height:300px;" >
			<?php 
			while ($row = mysqli_fetch_array($results, MYSQLI_BOTH)) 
			{
				echo "<div class="col-md-4 news">".$row['Titre'].<br/>.$row['Contenu']."</div>"; 
			} 
?>
			
		</div>
		<div  class="col-md-1" style="top: 20px;color:red;height:300px; float:right">
		</div>
	<div  class="col-md-2" style="top: 20px;color:red;height:300px; float: right; ">
		<div style="height:150px; float: right; border:1px solid white;">
			grrrrrrrrr rrrrrrrr rrrrrr rrrrrrrr rrrrrr
		</div> 
		<div  style="height:150px; float: right; text-align: center ;  border:1px solid white;">
			grrrrrrrrr rrrrrrrr rrrrrr rrrrrrrr rrrrrr
		</div> 
	</div>
		
	</div>
	<div class="row">
		<div class="col-md-9" style="top: 20px; color:green; height:300px;" >
			<div class="col-md-4 news">
			aaaaaaaaaaaaaaaaaaaaaaaaa aaaaaa aaaaaaa aaaaaa aaaaaa aaaaaaaaaa
			aaaaaaaaaaaaaaaaaaaaaaa aaaaa aaaaaaaaaaaaaaaaaaaaaaaaaa
			aaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaa aaaaaaaaaaaa
		</div>
		<div class="col-md-4 news" >
			zerzeg rqkzerg qzfl qzefqzle fgqzmfqzflqzegfqzmfhq hqmtj q*tj q*tjqzt qz
			 qze^tz*t qzjt*qzj zµETJQZµTQJZµGQZµGQKZ
			 GQZ
			 GQZ QK

		</div>
		<div class="col-md-4 news" >
			trtrtrtrtr rt rtrtrtrtr rt rtr tr trtr
			ttztzetze zet zetzer qqz  fqzrgjhze ugzlgz
			ztzq  gqzkug qzlguqz qzlguqzlgqz

		</div>

		</div>
		<div  class="col-md-1" style="top: 20px;color:red;height:300px; float:right">
		</div>
	<div  class="col-md-2" style="top: 20px;color:red;height:300px; float: right;">
		<div style="height:150px; float: right;  border:1px solid white;">
			grrrrrrrrr rrrrrrrr rrrrrr rrrrrrrr rrrrrr
		</div> 
		<div  style="height:150px; float: right;  border:1px solid white;">
			grrrrrrrrr rrrrrrrr rrrrrr rrrrrrrr rrrrrr
		</div> 
	</div>
		
	</div>

</div>
