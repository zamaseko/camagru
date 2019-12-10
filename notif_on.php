<?php

include "config/database.php";

$use = $_GET['usr'];
$not = 1;
$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $connect->prepare("PDATE users SET notif = '1' WHERE username =:username");
$stmt->bindValue(':username', $use);
$stmt->execute(['username' => $use]);
$usr_n = $usr[8];

?>