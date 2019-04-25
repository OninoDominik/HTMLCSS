<?php
$servername = "localhost";
$username = "root";
$password = "root";
try {
    $conn = new PDO("mysql:host=$servername;dbname=hbck", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    function getAllUsers($conn){
    	return $conn->query("SELECT * FROM users");
    }

    function userExists($username,$conn){
    	$sql =  "SELECT * FROM users";
    	foreach  ($conn->query($sql) as $row) {
        	if ($_POST['username']==$row['Login']) {
            	return True;
        	}
    	}
    	return false;
    }

    function checkPassword($username,$password,$conn){
    	$sql = $conn->query("SELECT * FROM users WHERE Login='".$username."'");
    	$oneUser= $sql->fetch();
    	if ($password==$oneUser['Mdp']) {
    		return True;
    	}else{
    		return False;
    	}
    }

    function checkGroupe($username,$conn){
    	$sql = $conn->query("SELECT * FROM users WHERE Login='".$username."'");
    	$oneUser= $sql->fetch();
    	if ($oneUser['GroupeId']==1) {
    		return 1;
    	}elseif($oneUser['GroupeId']==2){
    		return 2;
    	}
    }

    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>