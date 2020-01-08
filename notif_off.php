<?php 
session_start();
$use = $_SESSION['vkey'];
include "config/database.php";

try
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($use))
    {
        $stmt = $connect->prepare("SELECT * FROM users WHERE vkey = :vkey");
        $stmt->bindValue(':vkey', $use);
        $stmt->execute();
        $usr = $stmt->fetch();
        if($use == $usr[7])
        {
            $stmt = $connect->prepare("UPDATE users SET notif = '0' WHERE vkey = :vkey");
            $stmt->bindParam(':vkey', $use);
            $stmt->execute();
            header("Location: notif.php");
        }
        else
        {
            echo "<b>Your notifications are already switched OFF, to turn them ON select YES button<b>";
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