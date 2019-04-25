	<?php 
if(isset($_POST['supprimerUser']))
{
	$conn->exec("DELETE FROM users WHERE Login='".$_POST['Login']."'");
}

if(isset($_POST['modifierUser']))
{
    if($_POST['Droit']=='Administrateur'){
        $conn->exec("UPDATE users set Login='".$_POST['Login']."', Mdp='".$_POST['Mdp']."', GroupeId=1 where UserId =".$_POST['UserId'].";");
    }elseif ($_POST['Droit']=='Rédacteur') {
        $conn->exec("UPDATE users set Login='".$_POST['Login']."', Mdp='".$_POST['Mdp']."', GroupeId=2 where UserId =".$_POST['UserId'].";");
    }
}

if(isset($_POST['validerPreinscription']))
{
    $conn->exec("UPDATE preinscription set Validation=1 WHERE PreinscriptionId=".$_POST['PreinscriptionId'].";");
}
	?>
	<div class="container">
    <h2>Liste des utilisateurs</h2><br/>
    <button><a href="index.php?page=createUser">Créer un utilisateur</a></button><br/>
	<div class='row'>
        <div class="col-2">Pseudo</div>
        <div class="col-2">Mot de passe</div>
        <div class="col-2">Droit</div>   
    </div>
		<?php 						
			foreach  (getAllUsers($conn) as $row) {
                if($row['GroupeId']==1){
                    $avoirDroit='Administrateur';
                }else{
                    $avoirDroit='Rédacteur';
                }

        		echo "<form action='' method='POST' style='color: #ffc107;'><input type='hidden' name='UserId' value='".$row['UserId']."' required>";
        		echo "<input type='text' name='Login' placeholder='".$row['Login']."' required> ";
        		echo "<input type='text' name='Mdp' placeholder='".$row['Mdp']."'required>";
        		echo "<input type='hidden' name='GroupeId' placeholder='".$row['GroupeId']."' required>";
                echo "<select name='Droit' size='1'>
                      <option selected value=".$avoirDroit."> ".$avoirDroit." </option>
                      <option value='1'>Administrateur</option>
                      <option value='2'>Rédacteur</option>
                      </select>";
        		echo "<button type='submit' name='modifierUser'>Modifier</button><button type='submit' name='supprimerUser'>Supprimer</button></form><br/>";
    		}	
    	?>
    <br/>

    <?php 
        include("preinscription.php");
    ?>

    </div>