<?php
session_start();
include_once '../config/database.php';
try
{
	$use = $_SESSION['vkey'];
    $em = $_GET['email'];
    $nus = $_GET['usr'];
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connect->prepare("UPDATE users SET username =:username WHERE email_address =:email_address");
    $stmt->execute(['username' => $nus , 'email_address' => $em]);
    if($use)//$usr[1] == $$nus)
    {
        echo 'Username has successfully been updated';
    }
    else 
    {
        echo 'Username update not successful';
    }
}
catch(PDOException $e)
{
    echo $e;
}
?>
