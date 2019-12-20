<?php

include "head.php";
//include "config/database.php";

try{
$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$stmt = $connect->prepare("SELECT * FROM media ORDER BY media_date DESC");
$stmt->execute();
$med_fetch = $stmt->fetch();
if($med_fetch)
{  
    var_dump($med_match);
    
}
}
catch(PDOException $e)
{
    echo $e;
}
?>