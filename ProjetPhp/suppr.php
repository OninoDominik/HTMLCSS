<?php
$obj_database=new Database();
$obj_database->Query("update cochon set Heure_mort=now() WHERE id_cochons='".$_GET['id']."'");
?>
<script>location.href='index.php?page=liste_cochon';</script>