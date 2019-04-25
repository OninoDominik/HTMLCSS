<?php
// on se connecte à projethbck.ddns.net et au port 3306  
$database= new mysqli("localhost","root","root","hbck");
if (!$database) {
	die('Connexion impossible : ' . mysql_error());
}
if (!mysqli_set_charset($database, "utf8")) {
   printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($database));
   exit();
}
//echo 'Connecté correctement';

// On récupère l identifiant de l equipe qui est passer en paramètre par la pag index 
$eqnum=$_GET['id'];
//echo $eqnum;
 
?>

<!--  -->
<!--  Image de l Equipe -->
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<!--  <div class="equipe equipe1"> -->
				<div>
					
					<?php
						//préparation de la requète recherche du nom de l équipe et du chemin de l image 
						$req="SELECT NomEquipe,ImageURL FROM `equipe` WHERE EquipeId =".$eqnum;		//attention guillemet du altgr7 *//	  
						//on éxécute la requète 
						$resultat= $database->query($req);
					   	//fetch = récupération en mémoire de l enregistrement suivant 
						$row = mysqli_fetch_array($resultat,MYSQLI_BOTH);   
						
						// echo $row[0]; *// 
						//
						echo "<h1>".$row['NomEquipe']."</h1>";
				        if ( !$row['ImageURL'] ){
				            echo "Pas d'image de l'equipe ";
				        } else {
				            // echo "<img src='" .$row['ImageURL']."' width=600px height=400px >";
				           echo "<img src='" .$row['ImageURL']."' height=400px  >";
				        }


					?>
				
					<!-- à remplacer par la requete qui va chercher l URL en base à partir du numéro d equipe fournit par la page acceuil  -->
					
		
			</div>			
		</div>
	</div>
</div>

<!-- Présentation de l Equipe  -->
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<!-- texte à recupérer en base  -->
					<?php
						//préparation de la requète recherche du nom de l équipe et du chemin de l image 
						$req="SELECT Presentation FROM `equipe` WHERE EquipeId =".$eqnum;		//attention guillemet du altgr7 *//	//on éxécute la requète   
						$resultat= $database->query($req);
					  	//fetch = récupération en mémoire de l enregistrement suivant 
						$row = mysqli_fetch_array($resultat,MYSQLI_BOTH);   
						
						// echo $row[0]; *// 

						
				        if ( !$row[0] ){
				            echo "Pas de presentation ";
				        } else {
				            echo $row[0];
				           
				        }

						


					?>
						
		</div>
	</div>
</div>

<!--Dernier résultat de l Equipe  -->
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<!-- texte à recupérer en base  -->
					<h2>Dernier Résultat : </h2>
					<?php
						//préparation de la requète recherche du nom de l équipe et du chemin de l image 
						$req="SELECT ScoreDomicile,ScoreExterieur, EquipeIdExterieur,EquipeIdDomicile  FROM `agenda` 
						WHERE dateM = (SELECT max(dateM) FROM `agenda`
										 WHERE (EquipeIdExterieur=".$eqnum." OR EquipeIdDomicile=".$eqnum." )
										        AND (ScoreDomicile > 0 AND  ScoreExterieur > 0 ));";
								//attention guillemet du altgr7 *//	  

						//on éxécute la requète   
						$resultat= $database->query($req);
					 
					  	//fetch = récupération en mémoire de l enregistrement suivant 
						$row = mysqli_fetch_array($resultat,MYSQLI_BOTH);   
						
						// echo $row[0]; *// 

						
				        if ( !$row[0] ){
				            echo "Pas de Résultat ";
				        } else {
				        //    echo $row[0];      // recup le résultat dans des variable de travail 
				        //    echo $row[1];
				        //    echo $row['ScoreDomicile']; 
				        //    echo $row['ScoreExterieur'];
				        //    echo $row['EquipeIdExterieur'];
				        //    echo $row['EquipeIdDomicile'];
				      //      $IdEqDOM= $row[EquipeIdDomicile];
				      //      $IdEqEXT= $row[EquipeIdExterieur];
				       //     $resdom = $row[ScoreDomicile];
				      //    $resext = $row[ScoreExterieur];

				            $req2="SELECT NomVille  FROM `equipe` 
						 	WHERE equipeId = ".$row['EquipeIdDomicile'].";";
						 	//echo $req2;
						 	$villeDom= $database->query($req2);
						 	$vDom = mysqli_fetch_array($villeDom,MYSQLI_BOTH);  


				            $req3="SELECT NomVille  FROM `equipe` 
						 	WHERE equipeId = ".$row['EquipeIdExterieur'].";";
						 	//echo $req3;
						 	$villeExt= $database->query($req3);
							$vExt = mysqli_fetch_array($villeExt,MYSQLI_BOTH);  

				       	    echo "<h2>". $vDom[0]." ".$row['ScoreDomicile']." - ".$row['ScoreExterieur']." ".$vExt[0]."</h2>";
				        }
				        // Refaire une requette récup du nom de l équipe à partire de l idEquipe ext et dom 

					?>
			
			<!-- à remplacer par la requete qui va chercher l URL en base à partir du numéro d equipe fournit par la page acceuil  -->
		</div>
	</div>
</div>


<!--Prochain match de l Equipe  -->
<div class="container">
	<div class="row">
		<div class="col-md-12">	
			<!-- texte à recupérer en base  -->
					
					<?php
						
				        $req="SELECT EquipeIdExterieur,EquipeIdDomicile,extract(DAY from dateM),extract(month from dateM),extract(year from dateM)  FROM `agenda` 
						WHERE dateM=(SELECT min(dateM) FROM `agenda`
										 WHERE (EquipeIdExterieur=".$eqnum." OR EquipeIdDomicile=".$eqnum." )
										        AND (ScoreDomicile is NULL AND  ScoreExterieur is NULL));";
								//attention guillemet du altgr7 *//	  

						$resultat= $database->query($req);
						$row = mysqli_fetch_array($resultat,MYSQLI_BOTH);   


						
				        if ( !$row[0] ){
				            echo "Pas de Résultat ";
				        } else {
				        //    echo $row[0];      // recup le résultat dans des variable de travail 
				        //    echo $row[1];
				        //    echo $row['ScoreDomicile']; 
				        //    echo $row['ScoreExterieur'];
				        //    echo $row['EquipeIdExterieur'];
				        //    echo $row['EquipeIdDomicile'];
				      //      $IdEqDOM= $row[EquipeIdDomicile];
				      //      $IdEqEXT= $row[EquipeIdExterieur];
				       //     $resdom = $row[ScoreDomicile];
				      //    $resext = $row[ScoreExterieur];

				            $req2="SELECT NomVille  FROM `equipe` 
						 	WHERE equipeId = ".$row['EquipeIdDomicile'].";";
						 	//echo $req2;
						 	$villeDom= $database->query($req2);
						 	$vDom = mysqli_fetch_array($villeDom,MYSQLI_BOTH);  


				            $req3="SELECT NomVille  FROM `equipe` 
						 	WHERE equipeId = ".$row['EquipeIdExterieur'].";";
						 	//echo $req3;
						 	$villeExt= $database->query($req3);
							$vExt = mysqli_fetch_array($villeExt,MYSQLI_BOTH);  

				       	    echo "<h2>"."Prochain match: <br/>". $vDom[0]." - ".$vExt[0]." le ".$row[2]."/".$row[3]."/".$row[4]."<h2>";
				       	}

					?>
		</div>
	</div>
</div>