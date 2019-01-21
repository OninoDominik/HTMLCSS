<form method="post"" enctype="multipart/form-data"> <!--  action="traitement.php  ==>  action = page a la quelle le entrée du formulaire son envoyé(dans se cas la page=traitement.php) enctype="multipart/form-data" permet de parcourrir le disque dur du poste client  -->
	<label for="username">Votre Nom :</label> 
	<input type="text" name="username" id="username"><br/>

	<label for="userpassword">Votre Mot de passe :</label>
	<input type="password" name="userpassword" id="userpassword" required><br/>

	<label for="useremail">Votre Email :</label>
	<input type="email" name="useremail" id="useremail" required><br/>

	<label for="userchild">Nombre d'enfants :</label>
	<input type="number" name="userchild" id="userchild"  min="1" max="10"><br/>

	<label for="usersize">Taille :</label>
	<input type="range" name="usersize" id="usersize"  step="5" min="120" max="210"><br/>

	<label for="userbirth">Date de Naissance :</label>
	<input type="date" name="userbirth" id="userbirth"><br/>

	<label for="usertown">Ville :</label>
	<input type="text" name="usertown" id="usertown" placeholder='Strasbourg'><br/>

	<label for="pilosite">Pilosité :</label>
	<select type="text" name="pilosite" id="pilosite" ><br/>
		<option value='rase'>Rasé</option>
		<option value='court'>Court</option>
		<option value='moyen'>Moyen</option>
		<option value='long'>Long</option>
	</select> <br/>

	<label for="mariage">Marié :</label><br/>
	<input type="radio" name="mariage" id="celib" value="celib" '> <label for="celib">Célibataire</label><br/>
	<input type="radio" name="mariage" id="couple" value="couple" '> <label for="couple">Couple</label><br/>
	<input type="radio" name="mariage" id="complique" value="complique" '> <label for="complique">Compliqué</label><br/>

	<label for="nourriture">Nourriture :</label><br/>
	<input type="checkbox" name="nourriture" id="viande" value="viande" '> <label for="viande">Viande</label><br/>
	<input type="checkbox" name="nourriture" id="legumes" value="legumes" '> <label for="legumes">Legumes</label><br/>
	<input type="checkbox" name="nourriture" id="fruits" value="fruits" '> <label for="fruits">Fruits</label><br/>

	<label for="usernav">Votre Navigateur :</label> 
	<input type="text" name="username" id="username" list="browser"><br/>
	<datalist id='browser'>
		<option value='ie'>Internet Explorer</option> 
		<option value='firefox'>Firefox</option> 
		<option value='chrome'>Google Chrome</option> 
	</datalist>

	<label for="commentaire">Votre Commentaire :</label> 
	<textarea name="commentaire" id="commentaire"></textarea><br/>

	<button type="submit">Envoyer</button>

</form>