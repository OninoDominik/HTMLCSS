<?php

class Database{
    
    var $dbName="";
    var $dbUser="";
    var $userPass="";
    var $hostName="";
    var $connection="";
    
    function __construct($host="localhost",$user="root",$password="root",$base="projetcochon"){
        $this->dbName=$base;
        $this->dbUser=$user;
        $this->userPass=$password;
        $this->hostName=$host;
        
        $this->makeConnect();
    }
    
    function makeConnect(){
        $this->connection=new mysqli($this->hostName, $this->dbUser, $this->userPass, $this->dbName);
    }
    
    function choose($table, $champs, $id){
        $query = 'SELECT '.$champs.' FROM '.$table.' WHERE '.$table.'Id = '.$id.'';
        return $this->Query($query);
    }
    
    function revise($table, $champs, $id, $value){
        $query = 'UPDATE '.$table.' SET '.$champs.' = "'.$value.'" WHERE '.$table.'Id = "'.$id.'"';
        echo "<br/>".$query;
        $this->Query($query);
    }
    function insertNew($table){
        $query= "INSERT INTO ".$table." (".$table."Id ) VALUES (DEFAULT)";
        echo $query;
        return $this->Query($query);
    }
    
    function Query($request){
        if($request===""){
            echo "<b>Attention requête absente</b>";
            exit();
        }
        
        //Coupe la requête sur les espaces
        $tabReq= explode(" ", $request);
        
        //Met en majuscules le 1er mot
        $typeReq= strtoupper($tabReq[0]);
        
        $result = $this->connection->query($request);
        
        
        //si SELECT récupération du résultat dans un tableau associatif
        if($typeReq==="SELECT"){
            $tabResult = array();
            while($ligne = mysqli_fetch_array($result, MYSQLI_BOTH)){
                array_push($tabResult,$ligne);
            }
            return $tabResult;
        } else if ($typeReq==="INSERT") {
            return $this->connection->insert_id;
        }else {
            return $result;
        }
        
        
        //si .. ...
    }
}