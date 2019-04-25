<?php 
	if (isset($_POST['valider'])) {
		$conn->exec("INSERT INTO users(Login,Mdp,GroupeId) Values('".$_POST['Login']."','".$_POST['Mdp']."',".$_POST['GroupeId'].")");
		echo "<script>location.href='index.php?page=administrateur';</script>";	
	}
	if (isset($_POST['retour'])) {
		echo "<script>location.href='index.php?page=administrateur';</script>";	
	}
?>

<div class="container">
	<h2>Création d'un utilisateur</h2><br>
	<div>
		<form action="" method="post">
			<div class="row">
				<div class="col-3">
					Entrez un pseudo:<br>
					Entrez un mot de passe:<br>
				</div>
				<div class="col-4">
					<input type="text" name="Login" required><br/>
					<input type="text" name="Mdp" required><br/>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					Accordez un droit à cet utilisateur:
				</div>
				<div class="col-4">
					<input type="radio" name="GroupeId" value="1">
					<label for="celib">Administrateur</label>
					<input type="radio" name="GroupeId" value="2">
					<label for="celib">Rédacteur</label>
				</div>
			</div>			
			<button type="submit" name="valider" value="valider"><a href=""></a> Valider</button>
			<a href="index.php?page=administrateur" style="margin-left: 50px;">Retour</a></button>
		</form>
	</div>
</div>