<?php
session_start();
include_once '../config/database.php';
try
{
	$use = $_SESSION['vkey'];	
	if (isset($use))
	{
    	$em = $_GET['email'];
   	//	$opwd = $_GET['pass'];
   		$npwd = md5($_GET['pass2']);
    	$dsn = "mysql:host=$server;dbname=$db";
    	$connect = new PDO($dsn, $user, $password);
    	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$stmt = $connect->prepare("UPDATE users SET  pass_word =:pass_word WHERE email_address =:email_address");
    	$stmt->bindParam('pass_word', $npwd);//md5($npwd));
    	$stmt->execute(['pass_word' => $npwd , 'email_address' => $em]);
		if($use)
    	{
        	echo 'Password has successfully been updated';
    	}
    	else 
    	{
       		echo 'Password update not successful';
		}
	}
}
catch(PDOException $e)
{
    echo $e;
}

?>
