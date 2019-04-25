<h2>Demande(s) de préinscription en attente de validation</h2>
<br>
<div class="row">
	<div class="col">
		Nom/Prénom/Date de naissance
	</div>
	<div class="col">
		Adresse/Code postal/ville
	</div>
	<div class="col">
		Email/Téléphone
	</div>
	<div class="col">
		Statut(s)
	</div>

</div>
<?php
     	foreach  ($conn->query("SELECT * FROM `preinscription` WHERE `Validation` = 0 ;") as $ligne) {
     		if($ligne['Licence']==1){
     			$avoirLicence='Licencié(e)';
     		}else{
     			$avoirLicence='Non licencié(e)';
     		}

     		if($ligne['Arbitre']==1){
     			$etreArbitre='Arbitre';
     		}else{
     			$etreArbitre='Non arbitre';
     		}
     		
     		if($ligne['Joueuse']==1){
     			$etreJoueuse='Joueuse';
     		}else{
     			$etreJoueuse='Non Joueuse';
     		}
     		
     		if($ligne['Benevole']==1){
     			$etreBenevole='Bénévole';
     		}else{
     			$etreBenevole='Non bénévole';
     		}

        	echo "<form action='' method='POST' style='color: #ffc107;'><input type='hidden' name='PreinscriptionId' value='".$ligne['PreinscriptionId']."'><div class='row'>";

        	echo "<div class='col'><input type='text' name='Nom' value='".$ligne['Nom']."'disabled>";
        	echo "<input type='text' name='Prenom' value='".$ligne['Prenom']."'disabled>";
        	echo "<input type='text' name='DateNaissance' value='".$ligne['DateNaissance']."'disabled></div>";

        	echo "<div class='col'><input type='text' name='Adresse' value='".$ligne['Adresse']."'disabled>";
        	echo "<input type='text' name='CodePostal' value='".$ligne['CodePostal']."'disabled>";
        	echo "<input type='text' name='Ville' value='".$ligne['Ville']."'disabled></div>";

        	echo "<div class='col'><input type='text' name='Email' value='".$ligne['Email']."'disabled>";
        	echo "<input type='text' name='Tel' value='".$ligne['Tel']."'disabled></div>";

        	echo "<div class='col'><input type='text' name='GroupeId' value='".$avoirLicence."'disabled>";
        	echo "<input type='text' name='Arbitre' value='".$etreArbitre."'disabled>";
        	echo "<input type='text' name='Joueuse' value='".$etreJoueuse."'disabled>";
        	echo "<input type='text' name='Benevole' value='".$etreBenevole."'disabled></div>";
        	echo "<button type='submit' name='validerPreinscription'>Valider</button></div></form><br/>";
    	}

?>
