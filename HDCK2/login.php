<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet" media="all" type="text/css">

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php?page=logged" method="post">
		<div class="container">
			<div class="row">
				<div class="col-2"style="color: #ffc107;">
					Identifiant:<br>
					Mot de passe:
				</div>
				<div class="col">
					<input type="text" name="username" required><br>
		 			<input type="password" name="password" required><br>
		 			<button type="submit" value="validerlogin">Valider</button>
				</div>
			</div>
		</div>
	</form>
</body>
</html>