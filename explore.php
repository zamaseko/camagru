<?php
include "head.php";
?>

<html>
<div>
<h1 class='explore page'>Explore</h1>
</html>
<?php

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$page = 6;
$i = 0;
$
$mys = "SELECT * FROM media ORDER BY postdate desc";
$stmt = $connect->prepare($mys);
$stmt->execute();
$usr = $stmt->fetchAll();

?>
