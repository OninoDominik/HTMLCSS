<!DOCTYPE html>
<html>
<head>
	<title>exo javascript</title>
</head>
<body>
	<input type="text" value='' id=heure>
	<button onClick="afficheHeure();">Heure ?</button>
	<div id="results"></div>
	<input type="text" value='' id=opgauche>
	<input type="text" value='' id=opdroite>
	<input type="hidden" value='' id=operateur>
	<button onClick="document.getElementById('operateur').value='add';">+</button>
	<button onClick="document.getElementById('operateur').value='sou';">-</button>
	<button onClick="document.getElementById('operateur').value='div';">/</button>
	<button onClick="document.getElementById('operateur').value='mul';">*</button>
	<button onClick="calcul(document.getElementById('opgauche').value, document.getElementById('opdroite').value);">Calcul</button>
	<script>

		function afficheHeure() 
		{
			var now = new Date();
			var msg ;
			var heure =now.getHours();
			heure=document.getElementById('heure').value;
			var elemResult=document.getElementById('results') ;
			if (heure >= 0 && heure<12) 
			{
				msg='Bonjour';
				elemResult.style.color='green';
			} 
			else if (heure<20) 
			{
				msg='Bon apres-midi';
				elemResult.style.color='orange';
			} 
			else 
			{
				msg='Bonne nuit';
				elemResult.style.color='red';
			}
			elemResult.innerHTML = "<b>"+ msg +"</b>" ;
		}
		function calcul(chiffre1, chiffre2) 
		{
			var elemResult=document.getElementById('results') ;
			var operateur=document.getElementById('operateur').value ;
			switch(operateur)
			{
				case 'add':
				add(chiffre1, chiffre2);
				break;
				case 'sou':
				sou(chiffre1, chiffre2);
				break;
				case 'div':
				div(chiffre1, chiffre2);
				break;
				case 'mul':
				mul(chiffre1, chiffre2);
				break;
			} 
		}

		function add(chiffre1, chiffre2) 
		{
			var elemResult=document.getElementById('results') ;
			var result=parseFloat(chiffre1)+parseFloat(chiffre2);
			elemResult.innerHTML = "<b>"+ result +"</b>" ;
			var operateur='add()';
		}

		function sou(chiffre1, chiffre2) 
		{
			var elemResult=document.getElementById('results') ;
			var result=parseFloat(chiffre1)-parseFloat(chiffre2);
			elemResult.innerHTML = "<b>"+ result +"</b>" ;
			var operateur='sou()';
		}

		function div(chiffre1, chiffre2) 
		{
			var elemResult=document.getElementById('results') ;
			var result=parseFloat(chiffre1)/parseFloat(chiffre2);
			elemResult.innerHTML = "<b>"+ result +"</b>" ;
			var operateur='div()';
		}
		
		function mul(chiffre1, chiffre2) 
		{
			var elemResult=document.getElementById('results') ;
			var result=parseFloat(chiffre1)*parseFloat(chiffre2);
			elemResult.innerHTML = "<b>"+ result +"</b>" ;
			var operateur='mul()';
		}
	</script>
</body>
</html>