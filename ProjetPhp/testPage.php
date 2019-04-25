
<?php
//Connexion à la base de données
include_once('ConnexionBDD.php');
$hote="localhost";
$user="root";
$mdp="root";
$base="projetcochon";
 
$messagesParPage=5; //Nous allons afficher 5 messages par page.
$obj_database=new Database();
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
$queryyy= "SELECT * FROM cochon ORDER BY id_cochons DESC LIMIT '".$premiereEntree."', '".$messagesParPage."'";
echo $queryyy;
$retour_messages=$obj_database->Query($queryyy);
 
for( $j=0; $j<count($retour_messages);$j++) // On lit les entrées une à une grâce à une boucle
{

     echo '<table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                     <td><strong>Ecrit par : '.stripslashes($donnees_messages[$j]['pseudo']).'</strong></td>
                </tr>
                <tr>
                     <td>'.nl2br(stripslashes($donnees_messages[$j]['message'])).'</td>
                </tr>
            </table><br /><br />';
    //J'ai rajouté des sauts à la ligne pour espacer les messages.   
}
 
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
          echo ' <a href="testPage.php?LaPage='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
?>
</body>
</html>