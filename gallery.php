<?php

include "head.php";
include "config/database.php";

try{
$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$media = 0; 

$stmt = $connect->prepare("SELECT * FROM media ORDER BY media_date DESC");
$stmt->execute();
$med_fetch = $stmt->fetchAll();
while($med_fetch < $media)
{  
    var_dump($med_fetch);
	die();
}
}
catch(PDOException $e)
{
    echo $e;
}
?>
