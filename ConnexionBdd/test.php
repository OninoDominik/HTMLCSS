<?php

include('class_licencie.php');


$lic= new licencie(4);
echo $lic->get('nom');
echo "      ";

$toto= new licencie('new');
echo $toto->id;
$toto->set('nom','anna');
$toto->set('prenom','anna');
$toto->set('sexe','0');
$toto->set('numLicence','3333');

?>