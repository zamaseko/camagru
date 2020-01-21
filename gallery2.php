<?php

//session_start();
include "config/database.php";
include "head2.php";

//$use = $_SESSION['vkey'];
try
{
    //if (isset($use))
    //{
        //$dsn = "mysql:host=$server;dbname=$db";
        //$connect = new PDO($dsn, $user, $password);
        //$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$mys = "SELECT * FROM media ORDER BY media_date DESC";
        //$stmt = $connect->prepare($mys);
        //$stmt->execute();
        //$fetch_it = $stmt->fetchAll();
        $hw_many = count($fetch_it);
        $counter = 0;
        while($counter < $hw_many)
        {
            echo "<a href='index.php'><img src=".$fetch_it[$counter][3]."></a>";
            $counter++;
       }
    //}
}
catch(PDOException $e)
{
    echo $e;
}
?>