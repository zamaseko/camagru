<?php
session_start();
include_once '../config/database.php';
try
{
	$use = $_SESSION['vkey'];
    $em = $_GET['email'];
    $ne = $_GET['new'];
    $usrn = $_GET['usr'];
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connect->prepare("UPDATE users SET  email_address =:email_address WHERE username =:username");
    $stmt->bindParam('email_address', $ne);
    $stmt->execute(['username' => $usrn , 'email_address' => $ne]);
    if($use == true)//$usr[5] == $$ne)
    {
        echo 'Email address has successfully been updated';
    }
    else 
    {
        echo 'Email address update not successful';
    }
}
catch(PDOException $e)
{
    echo $e;
}
?>
