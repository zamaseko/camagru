<?php

include_once '../config/database.php';
try
{
    $em = $_GET['email'];
    $ne = $_GET['new'];
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connect->prepare("UPDATE users SET  email_address =:email_address WHERE email_address =:email_address");
    //$stmt->bindParam('username', $nus);
   // $stmt->bindParam('email_address', $em);
    $stmt->execute(['email_address' => $ne , 'email_address' => $em]);
    //$usr = $stmt->fetch();
    if($usr[5] == $$ne)
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