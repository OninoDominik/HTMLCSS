<?php
include_once('ConnexionBDD.php');
$hote="localhost";
$user="root";
$mdp="root";
$base="projetcochon";

$obj_database=new Database();
$req = "SELECT * FROM cochon";
$results = $obj_database->Query($req);
$req2 = "SELECT COUNT(*) AS total FROM cochon";
$results2 = $obj_database->Query($req2);
$total=$results2[0]['total'];
echo "test:".$total;
$messagesParPage=5; //Nous allons afficher 5 messages par page.
$req2 = "SELECT COUNT(*) AS total FROM cochon";
$results2 = $obj_database->Query($req2);
$total=$results2[0]['total'];
//Une connexion SQL doit être ouverte avant cette ligne...
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['LaPage'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['LaPage']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$queryyy= "SELECT * FROM cochon ORDER BY id_cochons DESC LIMIT ".$premiereEntree.", ".$messagesParPage."";
echo $queryyy;
$retour_messages=$obj_database->Query($queryyy);
$results = $obj_database->Query($queryyy);
 
 
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
          echo ' <a href="index.php?page=liste_cochon&LaPage='.$i.'">'.$i.'</a> ';
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
				<th scope="col">Heure_naissance</th>
				<th scope="col">Heure_mort </th>
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
				."<td><a href='index.php?page=suppr&id=".$results[$i]['id_cochons']."'> <img src='ham.gif' id='imgHBCKLogo'><a></td>"
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
				."<td> deja mort <img src='ham.jpg' id='imgHBCKLogo'> </td>"
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

  theme : 'ice', // theme "jui" and "bootstrap" override the uitheme widget option in v2.7+

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