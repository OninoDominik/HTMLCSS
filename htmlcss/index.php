<?php 
$myvar="Bonjour <br/> bro";


$fruits[0]='pomme <br/>';
echo $fruits[0];
$fruits[1]=5;
$fruits[2]=6;
$fruits['fifi']=$fruits[0];
$fruits['tata']=$fruits[1]*$fruits[2];

echo $fruits['tata'];
echo $myvar;

for($incrpair=0; $incrpair<100; $incrpair+=2)
{ 
	echo $incrpair."<br/>"; // symbole de la concatenation est le point .
	if ($incrpair==50) exit;
}
?>