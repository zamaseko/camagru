<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//session_start();
?>

<?php

//session_start();
include "config/database.php";
include "head.php";

$use = $_SESSION['vkey'];
try
{
    if (isset($use))
    {
        $dsn = "mysql:host=$server;dbname=$db";
        $connect = new PDO($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $mys = "SELECT * FROM media ORDER BY media_date DESC";
        $stmt = $connect->prepare($mys);
        $stmt->execute();
        $fetch_it = $stmt->fetchAll();
        $hw_many = count($fetch_it);
        $counter = 0;
        while($fetch_it)
        {
            echo '<a href=gallery.php><img src=""></a>';
            $counter++;
       }
    }
}
catch(PDOException $e)
{
    echo $e;
}
?>