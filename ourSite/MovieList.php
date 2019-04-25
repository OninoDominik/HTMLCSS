
<?php
error_reporting(E_ALL);
include 'DBConfig.php';
 
// Create connection
$conn = new mysqli($HostName, $HostUser, $HostPass, $DatabaseName);
 
if ($conn->connect_error) { 
 die("Connection failed: " . $conn->connect_error);
} 
//Check connection was successful

 
$sql = "SELECT * FROM `test`";
 
$result = $conn->query($sql);
$dbdata= array();
 
  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }
 
 
$json = json_encode($dbdata);
 echo $json;

$conn->close();

$host     = $HostName;
$user     = $HostUser;
$pass     = $HostPass;
$db       = $DatabaseName;
$dblink  = mysql_connect($host,$user,$pass);
mysql_select_db($db);
 
// REQUETE DE SELECTION
$resultat = mysql_query(" SELECT * FROM `test` ");
 
$json = array();
$i=0;
if(mysql_num_rows($resultat))
    {while($row=mysql_fetch_row($resultat)){
        $json[]=$row;
        $i++;
    }
}
?>