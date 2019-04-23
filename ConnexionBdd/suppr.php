<?php
$obj_database=new Database();
$obj_database->Query("DELETE from licencie WHERE licencieId='".$_GET['id']."'");
?>
<script>location.href='index.php?page=liste_licencie';</script>