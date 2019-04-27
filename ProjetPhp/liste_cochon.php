<?php
include_once('ConnexionBDD.php');


$obj_database=new Database();
$req = "SELECT * FROM cochon";
$results = $obj_database->Query($req);
$req2 = "SELECT COUNT(*) AS total FROM cochon";
$results2 = $obj_database->Query($req2);
$total=$results2[0]['total'];
if(isset($_POST['nbrparpage']))
{

	$messagesParPage=$_POST['nbrparpage']; 
	if ($_POST['nbrparpage'] != NULL)
		{
		$messagesParPage=$_POST['nbrparpage'];
	
		}
		else{
			$messagesParPage=5;
		}
		
}
else{
	if (isset($_GET['nbrparpage']))
	{
		if ($_GET['nbrparpage'] != NULL)
		{
		$messagesParPage=$_GET['nbrparpage'];
		}
		else{
			$messagesParPage=5;
		}
	}else
	{
		$messagesParPage=5;
	}
	
}

$req2 = "SELECT COUNT(*) AS total FROM cochon";
$results2 = $obj_database->Query($req2);
$total=$results2[0]['total'];

$nombreDePages=ceil($total/$messagesParPage);

if(isset($_GET['LaPage'])) 
{
	$pageActuelle=intval($_GET['LaPage']);
	
	if($pageActuelle>$nombreDePages) 
	{
		$pageActuelle=$nombreDePages;
	}
}
else 
{
	$pageActuelle=1;  
}

$premiereEntree=($pageActuelle-1)*$messagesParPage; 

$queryyy= "SELECT * FROM cochon ORDER BY id_cochons DESC LIMIT ".$premiereEntree.", ".$messagesParPage."";
$queryMale="SELECT COUNT(*) AS total FROM cochon where Sexe=1 and Heure_mort is Null";
$queryFemelle="SELECT COUNT(*) AS total FROM cochon where Sexe=0 and Heure_mort is Null";
$queryJambon ="SELECT COUNT(*) AS total ,SUM(Poids) AS poidsJambon FROM cochon where Heure_mort is not Null";
$nbrMale=$obj_database->Query($queryMale);
$nbrFemelle=$obj_database->Query($queryFemelle);
$nbrJambon=$obj_database->Query($queryJambon);
$retour_messages=$obj_database->Query($queryyy);
$results = $obj_database->Query($queryyy);
if ($nbrFemelle[0]['total']>1) {$plurielFemelle="s";} else {$plurielFemelle="";}
if ($nbrMale[0]['total']>1) {$plurielMale="s";} else {$plurielMale="";}
if ($nbrJambon[0]['total']>1) {$plurielJambon="s";} else {$plurielJambon="";}
if ($nbrJambon[0]['total']>1) {$plurielVerbeJambon="sont";} else {$plurielVerbeJambon="est";}
if ($nbrJambon[0]['poidsJambon']>1) {$plurielKiloJambon="s";} else {$plurielKiloJambon="";}
if ((((int)($nbrMale[0]['total']))+((int)($nbrFemelle[0]['total'])))>1) {$plurielPorcherie="s";} else {$plurielPorcherie="";}

echo 'Il y a '.$nbrFemelle[0]['total'].' cochon'.$plurielFemelle.' femelle'.$plurielFemelle.' en vie. <br/>';
echo 'Il y a '.$nbrMale[0]['total'].' cochon'.$plurielMale.' mâle'.$plurielMale.' en vie. <br/>';
echo 'Il y a '.$nbrJambon[0]['total'].' cochon'.$plurielJambon.' qui '.$plurielVerbeJambon. ' devenu'.$plurielJambon.' '.$nbrJambon[0]['poidsJambon'].' kilo'.$plurielKiloJambon.' de jambon, parce que tout est bon dans le cochon. <br/>';
echo 'La porcherie est composée  de '.(((int)($nbrMale[0]['total']))+((int)($nbrFemelle[0]['total']))).' cochon'.$plurielPorcherie.' vivant'.$plurielPorcherie.'. <br/> <br/><br/>';
echo '<form action="" method="POST">
<label for="formGroupExampleInput">Nombre de cochons par pages: </label>
<input type="number" min="1" required class ="form-control" style="min-width: 400px;min-height: auto" name="nbrparpage"'.' value='.((int)$messagesParPage).'; ?>
<br/>
<button type="submit" name="nbrparpages">valider</button>
</form>';
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
	//On va faire notre condition
	if($i==$pageActuelle) //Si il s'agit de la page actuelle...
	{
		echo ' [ '.$i.' ] '; 
	}	
	else //Sinon...
	{
		echo ' <a href="index.php?page=liste_cochon&LaPage='.$i.'&nbrparpage='.$messagesParPage.'">'.$i.'</a> ';
	}
}
echo '</p>';
?>
<div class="container">
<table class="tablesorter-blue" id='tbl_cochons'>
<thead>
<tr>
<th scope="col">Nom</th>
<th scope="col">Poids</th>
<th scope="col">Sexe</th>
<th scope="col">Naissance</th>
<th scope="col">Mort </th>
<th scope="col">Url_img </th>
<th  scope="col">Tuer le cochon</th>
</tr>
</thead>
<tbody>
<?php
for( $i=0; $i<count($results);$i++){
	if($results[$i]['Heure_mort']== NULL)
	{
		echo "<tr>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Nom']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Poids']."</a></td>";
		if ($results[$i]['Sexe']==0){ echo"<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>Femelle</a></td>";}
		else { echo"<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>Male</a></td>";}
		echo "<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Heure_naissance']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Heure_mort']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Url_img']."</a></td>"
		."<td><a href='index.php?page=suppr&id=".$results[$i]['id_cochons']."'> <img src='./ressource/image/ham.gif' id='imgHBCKLogo'><a></td>"
		."</tr> ";
	}
	else
	{
		echo "<tr>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Nom']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Poids']."</a></td>";
		if ($results[$i]['Sexe']==0){ echo"<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>Femelle</a></td>";}
		else { echo"<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>Male</a></td>";}
		echo "
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Heure_naissance']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Heure_mort']."</a></td>
		<td><a href='index.php?page=cochon&id=".$results[$i]['id_cochons']."'>".$results[$i]['Url_img']."</a></td>"
		."<td> deja mort <img src='./ressource/image/ham.jpg' id='imgHBCKLogo'> </td>"
		."</tr> ";
	}
	
}
?>

</table>
<tbody>
<br/><button><a href='index.php?page=cochon&id=new'> creer<a></button></div>

<script>
$(function() {
	
	// Extend the themes to change any of the default class names
	$.extend($.tablesorter.themes.jui, {
		// change default jQuery uitheme icons - find the full list of icons at
		// http://jqueryui.com/themeroller/ (hover over them for their name)
		table        : 'ui-widget ui-widget-content ui-corner-all', // table classes
		caption      : 'ui-widget-content',
		// header class names
		header       : 'ui-widget-header ui-corner-all ui-state-default', // header classes
		sortNone     : '',
		sortAsc      : '',
		sortDesc     : '',
		active       : 'ui-state-active', // applied when column is sorted
		hover        : 'ui-state-hover',  // hover class
		// icon class names
		icons        : 'ui-icon', // icon class added to the <i> in the header
		iconSortNone : 'ui-icon-carat-2-n-s ui-icon-caret-2-n-s', // class name added to icon when column is not sorted
		iconSortAsc  : 'ui-icon-carat-1-n ui-icon-caret-1-n', // class name added to icon when column has ascending sort
		iconSortDesc : 'ui-icon-carat-1-s ui-icon-caret-1-s', // class name added to icon when column has descending sort
		filterRow    : '',
		footerRow    : '',
		footerCells  : '',
		even         : 'ui-widget-content', // even row zebra striping
		odd          : 'ui-state-default'   // odd row zebra striping
	});
	
	// call the tablesorter plugin and apply the ui theme widget
	$("table").tablesorter({
		
		theme : 'blue', // theme "jui" and "bootstrap" override the uitheme widget option in v2.7+
		
		headerTemplate : '{content} {icon}', // needed to add icon for jui theme
		
		// widget code now contained in the jquery.tablesorter.widgets.js file
		widgets : ['uitheme', 'filter', 'zebra'],
		
		widgetOptions : {
			// zebra striping class names - the uitheme widget adds the class names defined in
			// $.tablesorter.themes to the zebra widget class names
			zebra   : ["even", "odd"],
			
			// set the uitheme widget to use the jQuery UI theme class names
			// ** this is now optional, and will be overridden if the theme name exists in $.tablesorter.themes **
			// uitheme : 'jui'
		}
		
	});
	
});
</script>