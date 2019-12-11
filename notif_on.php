<?php

$use = $_SESSION['vkey'];
include "config/database.php";
//$not = 1;
try
{
    
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($use))
    {
        $stmt = $connect->prepare("SELECT * FROM users WHERE vkey =:vkey");
        $stmt->bindValue(':vkey', $use);
        $stmt->execute(['vkey', $use]);
        $usr = $stmt->fetch();
        if($not)
        {
            $stmt = $connect->prepare("UPDATE users SET notif = '1' WHERE vkey = :vkey");
            // $stmt->bindParam(':username', $use);
            $stmt->bindParam(':vkey', $vkey);
            $stmt->execute();
        }
        else 
        {
            echo "<b>Your notifications are already switched ON, to turn them OFF select NO button<b>";
        }
    }
    else
    {
        echo 'voetsek';
    }
}
catch(PDOException $e)
{
    echo $e;
}
?>