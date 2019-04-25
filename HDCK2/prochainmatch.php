<link href="style.css" rel="stylesheet" media="all" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

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

 
?>


<!--Prochain match de l Equipe  -->

		<div class="col-md-12">	
			<!-- texte à recupérer en base  -->
					Prochain match : <br/>
					<?php
					
						$req="SELECT EquipeIdExterieur,EquipeIdDomicile,extract(DAY from dateM),extract(month from dateM),extract(year from dateM)  FROM `agenda` 
						WHERE (EquipeIdDomicile <12 Or EquipeIdExterieur<12) and ScoreExterieur IS NULL and ScoreDomicile IS NULL order by dateM ;";
								//attention guillemet du altgr7 *//	  

						$resultat= $database->query($req);
						//echo 'requete score : '.$req;
					?>
					<?php   
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

				       	    echo "". $vDom[0]." - ".$vExt[0]." le ".$row[2]."/".$row[3]."/".$row[4]."";
				        }
				        // Refaire une requette récup du nom de l équipe à partire de l idEquipe ext et dom 

					?>
			
			<!-- à remplacer par la requete qui va chercher l URL en base à partir du numéro d equipe fournit par la page acceuil  -->
		</div>
	