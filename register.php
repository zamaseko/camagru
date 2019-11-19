<?php

include 'config/database.php';

$usrname = $_POST['username'];
$email = trim($_POST['email_address']);
//$passwd = $_POST['pass_word'];

try
{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mys = "UPDATE users vkey ";	
	$mysq = "INSERT INTO users (username, email_address) VALUE username = :username or email_address = :email_address";
    $connect->prepare($mysq);
    $connect->exec();
    if($email)
    {
        echo "Press the link to continue";
        header('Location: login.php');
    }
}
catch(PDOException $e)
{
    echo $e;
}
?>
