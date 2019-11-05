<?php
$server = 'localhost';
$user_db = 'root';
$passwd = '';
$db = camagru_db;

$connect = mysqli_connect($server, $user_db, $passwd, $db);
if (!$connect)
{
    echo 'No connection established';
}
else 
{
    echo 'Connected to '.$db;
}
?>